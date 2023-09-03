<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\WeatherConditionDescription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $city_id
 * @property timestamp $fetch_timestamp
 * @property string $weather_condition
 * @property decimal $temperature
 * @property decimal $feels_like_temperature
 * @property int $humidity_percentage
 * @property decimal $wind_speed_kmph
 * @property string $wind_direction
 *
 * @mixin Model
 */
class WeatherLog extends Model
{
    use HasFactory;

    protected $table = 'weather_logs';

    protected $fillable = [
        'city_id',
        'fetch_timestamp',
        'weather_condition',
        'weather_condition_description',
        'temperature',
        'feels_like_temperature',
        'humidity_percentage',
        'wind_speed_kmph',
        'wind_direction',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    protected $appends = ['condition_img'];

    public function getConditionImgAttribute()
    {
        $weatherCondition = $this->attributes['weather_condition_description'];
        switch ($weatherCondition) {

            case WeatherConditionDescription::clear_sky->value:
                return WeatherConditionDescription::clear_sky->value.'.png';
            case WeatherConditionDescription::few_clouds->value:
                return WeatherConditionDescription::few_clouds->value.'.png';
            case WeatherConditionDescription::scattered_clouds->value:
                return WeatherConditionDescription::scattered_clouds->value.'.png';
            case WeatherConditionDescription::broken_clouds->value:
                return WeatherConditionDescription::broken_clouds->value.'.png';
            case WeatherConditionDescription::shower_rain->value:
                return WeatherConditionDescription::shower_rain->value.'.png';
            case WeatherConditionDescription::rain->value:
                return WeatherConditionDescription::rain->value.'.png';
            case WeatherConditionDescription::thunderstorm->value:
                return WeatherConditionDescription::thunderstorm->value.'.png';
            case WeatherConditionDescription::snow->value:
                return WeatherConditionDescription::snow->value.'.png';
            case WeatherConditionDescription::mist->value:
                return WeatherConditionDescription::mist->value.'.png';
            default:
                return WeatherConditionDescription::clear_sky->value.'.png';
        }
    }
}
