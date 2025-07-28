<?php

use App\Actions\v1\CreateShortening;
use App\Models\Shortening;

it('creates a shortening', function () {
    $url = 'https://test.com';

    $action     = $this->app->make(CreateShortening::class);
    $shortening = $action->handle($url);

    expect(Shortening::count())->toBe(1)
        ->and($shortening->original_url)->toBe('https://test.com');
});

it('returns the existing shortening if the given url is already been shortened', function () {
    $shortening = Shortening::factory()->create()->fresh();

    $action   = $this->app->make(CreateShortening::class);
    $response = $action->handle($shortening->original_url);

    expect(Shortening::count())->toBe(1)
        ->and($response->is($shortening))->toBeTrue();
});

it('generates a unique slug for each shortening', function () {
    $shortening = Shortening::factory()->create()->fresh();

    $action   = $this->app->make(CreateShortening::class);
    $response = $action->handle($shortening->original_url);

    expect(Shortening::where('slug', $response->slug)->count())->toBe(1);
});
