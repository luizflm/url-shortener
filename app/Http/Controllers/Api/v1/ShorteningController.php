<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\v1\CreateShortening;
use App\Http\Requests\Api\v1\StoreShorteningRequest;
use App\Http\Resources\v1\Shortening\{ShowResource, StoreResource};
use App\Models\Shortening;

class ShorteningController
{
    public function store(StoreShorteningRequest $request, CreateShortening $action)
    {
        $response = $action->handle($request->url);

        return new StoreResource($response);
    }

    public function show(Shortening $shortening): ShowResource
    {
        return new ShowResource($shortening);
    }
}
