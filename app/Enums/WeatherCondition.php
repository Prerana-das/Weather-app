<?php

declare(strict_types=1);

namespace App\Enums;

enum WeatherCondition: string
{
    case Clouds = 'Clouds';
    case Clear = 'Clear';
    case Rain = 'Rain';
}
