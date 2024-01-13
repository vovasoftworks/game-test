<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'member_id' => $this->resource->member_id,
            'milliseconds' => $this->resource->milliseconds,

            'created_at' => $this->resource->created_at ? $this->resource->created_at->format("Y-m-d H:i:s") : null,
            'updated_at' => $this->resource->updated_at ? $this->resource->updated_at->format("Y-m-d H:i:s") : null,
        ];
    }

}
