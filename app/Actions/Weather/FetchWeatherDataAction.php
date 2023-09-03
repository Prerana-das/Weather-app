<?php

declare(strict_types=1);

namespace App\Actions\Weather;

use App\Models\City;
use App\Models\WeatherLog;
use Illuminate\Support\Facades\Http;

class FetchWeatherDataAction
{
    //calling weather data api
    public function execute()
    {
        $allCity = City::query()->with('country')->get();

        foreach ($allCity as $city) {
            $city_param = $city->name.', '.$city->country->name;
            $this->getDataByCity($city->id, $city_param);
        }

    }

    public function getDataByCity($city_id, $city_param)
    {
        $response = Http::get(config('services.weather.weather_api').'q='.$city_param.'&units=metric&appid='.config('services.weather.weather_api_key'));
        $data = $response->json();

        $fetchTimestamp = now();
        $temperature = $data['main']['temp'] ?? null;
        $weatherCondition = $data['weather'][0]['main'] ?? null;
        $weatherConditionDescription = $data['weather'][0]['description'] ?? null;
        $feelsLikeTemperature = $data['main']['feels_like'] ?? null;
        $humidityPercentage = $data['main']['humidity'] ?? null;
        $windSpeedKmph = $data['wind']['speed'] ?? null;
        $windDirection = $data['wind']['deg'] ?? null;

        return WeatherLog::create(
            [
                'city_id' => $city_id,
                'fetch_timestamp' => $fetchTimestamp,
                'weather_condition' => $weatherCondition,
                'weather_condition_description' => $weatherConditionDescription,
                'temperature' => $temperature,
                'feels_like_temperature' => $feelsLikeTemperature,
                'humidity_percentage' => $humidityPercentage,
                'wind_speed_kmph' => $windSpeedKmph,
                'wind_direction' => $windDirection,
            ]
        );
    }
}
