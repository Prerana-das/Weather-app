<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property int $country_id
 * @property decimal|null $longitude
 * @property decimal|null $latitude
 * @property string|null $zip
 *
 * @mixin Model
 */
class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'name',
        'country_id',
        'longitude',
        'latitude',
        'zip',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
