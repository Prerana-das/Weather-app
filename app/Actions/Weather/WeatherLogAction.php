<?php

declare(strict_types=1);

namespace App\Actions\Weather;

use App\DTOs\StatisticsDto;
use App\Models\City;
use App\Models\WeatherLog;
use Carbon\Carbon;

class WeatherLogAction
{
    public function execute()
    {
        $weatherLogs = WeatherLog::query()
            ->with('city.country')
            ->orderBy('fetch_timestamp', 'desc')
            ->limit(6)
            ->get();

        return response()->json($weatherLogs);
    }

    public function getAllCity()
    {
        return City::query()->with('country')->get();
    }

    public function getStatisticsData(StatisticsDto $statisticsDto)
    {
        $numDataPoints = 12;
        $intervalInHours = 24 / $numDataPoints;

        $temperatureData = [];
        $humidityData = [];
        $windData = [];

        $currentDateTime = Carbon::now();
        $specificDate = $statisticsDto->filter_date ?? '';

        $twentyFourHoursAgo = $currentDateTime->subHours(24);

        for ($i = 0; $i < $numDataPoints; $i++) {
            $intervalStart = $twentyFourHoursAgo->copy()->addHours($i * $intervalInHours);
            $intervalEnd = $twentyFourHoursAgo->copy()->addHours(($i + 1) * $intervalInHours);

            $weatherLogs = WeatherLog::where(function ($query) use ($specificDate, $intervalStart, $intervalEnd) {
                $query->whereDate('fetch_timestamp', $specificDate)
                    ->orWhereBetween('fetch_timestamp', [$intervalStart, $intervalEnd]);
            })
                ->where('city_id', $statisticsDto->city_id)
                ->orderBy('fetch_timestamp', 'desc')
                ->limit(6)
                ->get();
            // $weatherLogs = WeatherLog::where('fetch_timestamp', '>=', $intervalStart)
            //     ->where('fetch_timestamp', '<=', $intervalEnd)
            //     ->where('city_id', $statisticsDto->city_id)
            //     ->get();

            $temperatures = $weatherLogs->pluck('temperature')->toArray();
            $humidities = $weatherLogs->pluck('humidity_percentage')->toArray();
            $windSpeeds = $weatherLogs->pluck('wind_speed_kmph')->toArray();

            $averageTemperature = count($temperatures) > 0 ? array_sum($temperatures) / count($temperatures) : 0;
            $averageHumidity = count($humidities) > 0 ? array_sum($humidities) / count($humidities) : 0;
            $averageWindSpeed = count($windSpeeds) > 0 ? array_sum($windSpeeds) / count($windSpeeds) : 0;

            $temperatureData[] = $averageTemperature;
            $humidityData[] = $averageHumidity;
            $windData[] = $averageWindSpeed;

        }

        return [
            'temperatureData' => $temperatureData,
            'humidityData' => $humidityData,
            'windData' => $windData,
        ];
    }
}
