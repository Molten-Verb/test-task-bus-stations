<?php

namespace App\Http\Services;

use App\Models\BusRoute;
use App\Http\Services\FindId;
use App\Http\Services\TimeService;

class Shedule
{
    public string $from;
    public string $to;

    private int $fromId;
    private int $toId;

    protected string $firstStation;
    protected string $lastStation;
    protected int $firstBus;
    protected int $lastBus;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function getFromId(): int
    {
        $findId = new FindId;
        $this->fromId = $findId->getStationId($this->from);

        return $this->fromId;
    }

    public function getToId(): int
    {
        $findId = new FindId;
        $this->ToId = $findId->getStationId($this->to);

        return $this->ToId;
    }

    public function getBusRoute(): object
    {
        $findId = new FindId;
        $routeId = $findId->getRouteId($this->from);

        $busRoute = BusRoute::with(['stations', 'buses'])->find($routeId);

        return $busRoute;
    }

    public function getInitialStation(): string
    {
        $stations = $this->getBusRoute()->stations->sortBy('position');
        $station = $stations->first();

        if ($this->getFromId() > $this->getToId()) {
            $station = $stations->last();
        }

        return $this->firstStationOfRoute = $station->name;
    }

    public function getFinalStation(): string
    {
        $stations = $this->getBusRoute()->stations->sortBy('position');
        $station = $stations->first();

        if ($this->getFromId() < $this->getToId()) {
            $station = $stations->last();
        }

        return $this->lastStationOfRoute = $station->name;
    }

    public function getFirstBus(): int
    {
        $bus = $this->getBusRoute()->buses->sortBy('id')->first();

        return $this->firstBus = $bus->number;
    }

    public function getLastBus(): int
    {
        $bus = $this->getBusRoute()->buses->sortByDesc('id')->first();

        return $this->lastBus = $bus->number;
    }

    public function getArrivals(): array
    {
        $timeService = new TimeService;

        return $timeService->getNextTimeArrivals();
    }
}
