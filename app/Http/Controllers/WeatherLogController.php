<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Weather\FetchWeatherDataAction;
use App\Actions\Weather\WeatherLogAction;
use App\DTOs\StatisticsDto;
use Illuminate\Http\Request;

class WeatherLogController extends Controller
{
    public function getWeatherLogData(WeatherLogAction $weatherLogAction)
    {

        // $fetchWeatherDataAction = new FetchWeatherDataAction();
        // $fetchWeatherDataAction->execute();

        return $weatherLogAction->execute();
    }

    public function getAllCity(WeatherLogAction $weatherLogAction)
    {
        return $weatherLogAction->getAllCity();
    }

    public function getStatisticsData(Request $request, WeatherLogAction $weatherLogAction)
    {
        return $weatherLogAction->getStatisticsData(StatisticsDto::fromRequest($request));
    }
}
