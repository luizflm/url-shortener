<?php

namespace App\Http\Resources\v1\Shortening;

use App\Models\Shortening;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Override;

/** @mixin Shortening */
class ShowResource extends JsonResource
{
    #[Override]
    public function toArray(Request $request): array
    {
        return [
            'url' => $this->original_url,
        ];
    }
}
