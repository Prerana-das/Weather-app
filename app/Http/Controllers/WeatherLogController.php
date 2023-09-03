<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Weather\WeatherLogAction;
use App\Actions\Weather\FetchWeatherDataAction;


class WeatherLogController extends Controller
{
    public function getWeatherLogData(WeatherLogAction $weatherLogAction)
    {

        // $fetchWeatherDataAction = new FetchWeatherDataAction();
        // $fetchWeatherDataAction->execute();

        return $weatherLogAction->execute();
    }

}
