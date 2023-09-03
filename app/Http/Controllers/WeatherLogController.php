<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Weather\WeatherLogAction;
use App\DTOs\StatisticsDto;
use Illuminate\Http\Request;

class WeatherLogController extends Controller
{
    //returning data index page
    public function getWeatherLogData(WeatherLogAction $weatherLogAction)
    {
        return $weatherLogAction->execute();
    }

    public function getAllCity(WeatherLogAction $weatherLogAction)
    {
        return $weatherLogAction->getAllCity();
    }

    //statistics data filter
    public function getStatisticsData(Request $request, WeatherLogAction $weatherLogAction)
    {
        return $weatherLogAction->getStatisticsData(StatisticsDto::fromRequest($request));
    }
}
