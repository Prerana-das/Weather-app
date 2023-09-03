<?php

declare(strict_types=1);

namespace App\Actions\Weather;

use App\Models\WeatherLog;

class WeatherLogAction
{
    public function execute()
    {
        $weatherLogs = WeatherLog::query()->with('city.country')->get(); 
        
        return response()->json($weatherLogs);
    }
}
