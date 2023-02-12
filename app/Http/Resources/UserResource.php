<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property User $resource
 */
class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'first_name' => $this->resource->first_name,
            'last_name' => $this->resource->last_name,
            'email' => $this->resource->email,
            'role' => $this->resource->role->name,
            'major' => $this->resource->major?->name ?? '',
            'education' => $this->resource->education,
            'aims_description' => $this->resource->aims_description,
            'about' => $this->resource->about,
            'registration_date' => $this->resource->created_at->diffForHumans(),
        ];
    }
}
