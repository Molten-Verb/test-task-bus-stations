<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FindBusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
            [
            'from' => $this->from,
            'to' => $this->to,
            'buses' => [
                ['route' => "Автобус №{$this->getFirstBus()} в сторону {$this->getFinalStation()}",
                'next_arrivals' => $this->getArrivals()],
            ],
            [
                ['route' => "Автобус №{$this->getLastBus()} в сторону {$this->getInitialStation()}",
                'next_arrivals' => $this->getArrivals()],
            ],
        ];
    }
}
