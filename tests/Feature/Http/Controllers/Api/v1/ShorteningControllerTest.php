<?php

use App\Models\Shortening;

use function Pest\Laravel\{assertDatabaseHas, postJson};

it('can store a shortening', function () {
    // Act: Send a POST request to the store endpoint
    $response = postJson('api/v1/shortenings', [
        'url' => 'https://google.com',
    ]);

    // Assert: Check if the database has the new shortening
    assertDatabaseHas('shortenings', [
        'original_url' => 'https://google.com',
    ]);

    // Assert: Check if the response status is 201
    $response->assertStatus(201);

    // Assert: Check if the response format is correct
    $response->assertJsonStructure([
        'data' => [
            'slug',
        ],
    ]);
});

it('returns an existing shortening if the submitted url has already been shortened', function () {
    // Arrange: Create a shortening to ensure that it already exists
    Shortening::factory()->create(['original_url' => 'https://google.com'])->fresh();

    // Act: Send a POST request to the store endpoint
    $response = postJson('api/v1/shortenings', [
        'url' => 'https://google.com',
    ]);

    // Assert: Check if the response status is 200
    $response->assertStatus(200);

    // Assert: Check if the response format is correct
    $response->assertJsonStructure([
        'data' => [
            'slug',
        ],
    ]);
});

it('can not store a shortening without a url', function () {
    // Act: Send a POST request to the store endpoint
    $response = postJson('api/v1/shortenings', []);

    // Assert: Check if the response status is 422
    $response->assertStatus(422);

    // Assert: Check if the response format is correct
    $response->assertJsonStructure([
        'message',
        'errors' => [
            'url',
        ],
    ]);
});

it('can not store a shortening with an invalid url', function () {
    // Act: Send a POST request to the store endpoint
    $response = postJson('api/v1/shortenings', [
        'url' => 'invalid_url',
    ]);

    // Assert: Check if the response status is 422
    $response->assertStatus(422);

    // Assert: Check if the response format is correct
    $response->assertJsonStructure([
        'message',
        'errors' => [
            'url',
        ],
    ]);
});
