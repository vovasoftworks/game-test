<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopResultsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'top' => $this->when(isset($this['top']), $this['top']),
            'self' => $this->when(isset($this['self']), $this['self']),
        ];
    }
}
