<?php declare (strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property int $user_id
 * @property int $city_id
 *
 * @mixin Model
 */
class UserUserUserCity extends Model
{
    use HasFactory;

    protected $table = 'user_cities';

    protected $fillable = [
        'user_id',
        'city_id',
    ];

}