<?php

namespace Core\Http\Responses;

use Core\Enums\Status;
use Core\Http\Responses\Concerns\HasResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\JsonResource;

final class ModelResponse implements Responsable
{
    use HasResponse;

    public function __construct(
        public readonly JsonResource $data,
        public readonly Status $status = Status::OK,
    ) {
    }
}
