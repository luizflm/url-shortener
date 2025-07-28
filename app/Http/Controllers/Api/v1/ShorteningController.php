<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\v1\CreateShortening;
use App\Http\Requests\Api\v1\StoreShorteningRequest;
use App\Http\Resources\v1\ShorteningResource;

class ShorteningController
{
    public function store(StoreShorteningRequest $request, CreateShortening $action): ShorteningResource
    {
        $response = $action->handle($request->url);

        return new ShorteningResource($response);
    }
}
