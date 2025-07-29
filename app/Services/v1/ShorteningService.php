<?php

namespace App\Services\v1;

use App\Models\Shortening;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShorteningService
{
    public function show(string $slug): Shortening
    {
        $shortening = Shortening::where('slug', $slug)->first();

        if (!$shortening instanceof Shortening) {
            throw new ModelNotFoundException();
        }

        return $shortening;
    }
}
