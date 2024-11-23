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
                        ["Автобус №{$this->firstBus} в сторону {$this->lastStation}"],
                        ["Автобус №{$this->lastBus} в сторону {$this->firstStation}"],
                    ],
            ];
    }
}

/* return [
    'from' => $this->from,
    'to' => $this->to,
    'buses' => [
        ['route' => "Автобус No11 в сторону ост. Попова"],
        ['route' => "Автобус No21 в сторону ост.Ленина"],
    ],
]; */
