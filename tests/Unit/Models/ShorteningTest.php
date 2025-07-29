<?php

use App\Models\Shortening;

test('to array', function (): void {
    $shortening = Shortening::factory()->create()->fresh();
    expect(array_keys($shortening->toArray()))->toEqual([
        'id',
        'original_url',
        'slug',
        'created_at',
        'updated_at',
    ]);
});
