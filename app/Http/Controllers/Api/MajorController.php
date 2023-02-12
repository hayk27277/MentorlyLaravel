<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MajorResource;
use App\Repositories\Contracts\MajorRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class MajorController extends Controller
{
    public function __construct(
        private MajorRepository $majorRepository
    ) {
    }

    public function __invoke(): AnonymousResourceCollection
    {
        $majors = $this->majorRepository->all();

        return MajorResource::collection($majors);
    }
}
