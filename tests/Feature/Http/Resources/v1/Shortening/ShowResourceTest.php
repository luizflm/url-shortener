<?php

use App\Http\Resources\v1\Shortening\ShowResource;
use App\Models\Shortening;
use Illuminate\Http\Request;

it('transforms shortening resource into array with slug', function () {
    $shortening = Shortening::factory()->create([
        'original_url' => 'https://test.com',
        'slug'         => 'abc123',
    ])->fresh();

    expect((new ShowResource($shortening))->toArray(new Request()))
    ->toBe([
        'url' => 'https://test.com',
    ]);
});
