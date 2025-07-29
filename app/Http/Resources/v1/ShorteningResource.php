<?php

namespace App\Http\Resources\v1;

use App\Models\Shortening;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Override;

/** @mixin Shortening */
class ShorteningResource extends JsonResource
{
    #[Override]
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
        ];
    }
}
