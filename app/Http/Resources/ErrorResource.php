<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class ErrorResource extends JsonResource
{

    public function withResponse($request, $response): void
    {
        $response->setStatusCode(403);
    }

    public function toArray($request): array|JsonSerializable|Arrayable
    {
        self::withoutWrapping();

        return parent::toArray($request);
    }
}
