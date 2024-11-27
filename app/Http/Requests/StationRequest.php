<?php

namespace App\Http\Requests;

use App\Rules\SameRoute;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'from' => ['required', Rule::exists('stations', 'name')],
            'to' => ['required', Rule::exists('stations', 'name')],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле :attribute должно быть заполнено',
            'exists' => 'Данная остановка не найдена',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->has('from') || $validator->errors()->has('to')) {
                return;
            }

            $sameRouteRule = new SameRoute($this->from);
            $sameRouteRule->validate('to', $this->to, function ($message) use ($validator) {
                $validator->errors()->add('to', $message);
            });
        });
    }
}
