<?php

namespace App\Http\Requests\Finance;

use Illuminate\Foundation\Http\FormRequest;

class FinanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date' => ["required", "date_format:Y-m-d"],
            'month' => ["required", "date_format:Y-m"],
            'year' => ["required", "date_format:Y"],
            'money' => ["required", "numeric"],
            'tax' => ["required", "numeric"],
        ];
    }

    /**
     * Подготовить данные для валидации.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // $month = $this->get('month') ?: now()->create($this->get('date') ?: now())->format("Y-m");
        // $this->merge([
        //     'month' => $month,
        //     'year' => (int) now()->create($month)->format("Y"),
        // ]);
    }
}
