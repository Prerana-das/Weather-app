<?php

declare(strict_types=1);

namespace App\Actions\Weather;

use App\Models\City;
use App\Models\WeatherLog;
use Illuminate\Support\Facades\Http;

class FetchWeatherDataAction
{
    public function execute()
    {
        $allCity = City::query()->with('country')->get();
        
        foreach ($allCity as $city) {
            $city_param = $city->name.', '.$city->country->name;
            $this->getDataByCity($city->id, $city_param);
        }

        return;
    }

    public function getDataByCity($city_id, $city_param){

        $response = Http::get(config('services.weather.weather_api') . 'q=' . $city_param . '&units=metric&appid=' . config('services.weather.weather_api_key'));
        $data = $response->json();

        $fetchTimestamp = now();
        $temperature = $data['main']['temp'];
        $weatherCondition = $data['weather'][0]['main'];
        $weatherConditionDescription = $data['weather'][0]['description'];
        $feelsLikeTemperature = $data['main']['feels_like'];
        $humidityPercentage = $data['main']['humidity'];
        $windSpeedKmph = $data['wind']['speed'];
        $windDirection = $data['wind']['deg'];

        return WeatherLog::updateOrInsert(
            ['city_id' => $city_id],
            [
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
