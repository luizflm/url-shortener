<?php

namespace App\Actions\v1;

use App\Models\Shortening;
use Illuminate\Support\Str;

class CreateShortening
{
    public function handle(string $url): Shortening
    {
        $shortening = Shortening::where('original_url', $url)->first();

        if (!$shortening) {
            $slug = $this->generateSlug();

            $shortening = Shortening::create([
                'original_url' => $url,
                'slug'         => $slug,
            ]);

            return $shortening;
        }

        return $shortening;
    }

    private function generateSlug(): string
    {
        $slug = Str::random(6);

        while (Shortening::where('slug', $slug)->exists()) {
            $slug = Str::random(6);
        }

        return $slug;
    }
}
