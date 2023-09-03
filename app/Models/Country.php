<?php declare (strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $name
 *
 * @mixin Model
 */
class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [
        'name'
    ];

}