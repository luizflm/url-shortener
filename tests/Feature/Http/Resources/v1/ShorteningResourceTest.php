<?php

use App\Http\Resources\v1\ShorteningResource;
use App\Models\Shortening;
use Illuminate\Http\Request;

it('transforms shortening resource into array with url', function () {
    $shortening = Shortening::factory()->create([
        'original_url' => 'https://test.com',
        'slug'         => 'abc123',
    ])->fresh();

    expect((new ShorteningResource($shortening))->toArray(new Request()))
    ->toBe([
        'url' => $shortening->getShorteningUrl(),
    ]);
});
