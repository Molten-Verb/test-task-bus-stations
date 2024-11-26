<?php

namespace App\Rules;

use Closure;
use App\Http\Services\FindId;
use Illuminate\Contracts\Validation\ValidationRule;

class SameRoute implements ValidationRule
{
    protected $from;
    protected $routeSecondStation;

    public function __construct($from)
    {
        $this->from = $from;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $findId = new FindId;
        $fromId = $findId->getRouteId($this->from);
        $toId = $findId->getRouteId($value);

        if ($fromId !== $toId) {
            $fail("Остановки относятся к разным маршрутам");
        }
    }
}
