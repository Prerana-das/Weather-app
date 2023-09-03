<?php

namespace App\Console\Commands;

use App\Actions\Weather\FetchWeatherDataAction;
use Illuminate\Console\Command;

class FetchWeatherData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:weather-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching weather data in every 10 minutes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        info('fetch in every 10 minutes');
        $fetchWeatherDataAction = new FetchWeatherDataAction();
        $fetchWeatherDataAction->execute();

    }
}
