<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\v1\CreateShortening;
use App\Http\Requests\Api\v1\StoreShorteningRequest;
use App\Http\Resources\v1\Shortening\{ShowResource, StoreResource};
use App\Services\v1\ShorteningService;

class ShorteningController
{
    public function __construct(private ShorteningService $service)
    {
    }

    public function store(StoreShorteningRequest $request, CreateShortening $action)
    {
        $response = $action->handle($request->url);

        return new StoreResource($response);
    }

    public function show(string $slug): ShowResource
    {
        $response = $this->service->show($slug);

        return new ShowResource($response);
    }
}
