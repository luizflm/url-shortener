<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $original_url
 * @property string $slug
 */
class Shortening extends Model
{
    use HasFactory;
}
