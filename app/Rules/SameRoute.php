<?php

namespace App\Rules;

use Closure;
use App\Models\Station;
use Illuminate\Contracts\Validation\ValidationRule;

class SameRoute implements ValidationRule
{
    protected $routeFirstStation;
    protected $routeSecondStation;

    public function __construct($firstStation, $secondStation)
    {
        $this->routeFirstStation = Station::where('name', $firstStation)->value('route_id');
        $this->routeSecondStation = Station::where('name', $secondStation)->value('route_id');
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->routeFirstStation !== $this->routeSecondStation) {
            $fail("Остановки относятся к разным маршрутам");
        }
    }
}
