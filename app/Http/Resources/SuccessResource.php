<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class SuccessResource extends JsonResource
{
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        self::withoutWrapping();

        return parent::toArray($request);
    }
}
