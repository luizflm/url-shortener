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

    /**
     * Get the current application url with a shortening's slug.
     */
    public function getShorteningUrl(): string
    {
        return url("/{$this->slug}");
    }
}
