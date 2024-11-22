<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RouteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'route' => [
                'name' => $this->name,

                'stations' => $this->stations->map(function ($station) {
                    return $station->name;
                }),

                'buses' => $this->buses->map(function ($bus) {
                    return $bus->bus_number;
                }),
            ],
        ];
    }
}
