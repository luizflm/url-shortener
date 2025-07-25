<?php

use App\Models\Shortening;

it('has a factory', function (): void {
    $shortening = Shortening::factory()->create()->refresh();
    expect($shortening->id)->toBe(1);
});

test('to array', function (): void {
    $shortening = Shortening::factory()->create()->refresh();
    expect(array_keys($shortening->toArray()))->toEqual([
        'id',
        'original_url',
        'slug',
        'created_at',
        'updated_at',
    ]);
});
