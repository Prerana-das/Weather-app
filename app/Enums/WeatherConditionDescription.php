<?php declare(strict_types=1);

namespace App\Enums;

enum WeatherConditionDescription: string
{
    case clear_sky = 'clear sky';
    case few_clouds = 'few clouds';
    case scattered_clouds = 'scattered clouds';
    case broken_clouds = 'broken clouds';
    case shower_rain = 'shower rain';
    case rain = 'rain';
    case thunderstorm = 'thunderstorm';
    case snow = 'snow';
    case mist = 'mist';
}





