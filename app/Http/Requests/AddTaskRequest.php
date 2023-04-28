<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'starting_at' => 'nullable|date',
            'ends_at' => 'nullable|date|after_or_equal:starting_at',
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'required_profit' => 'required|integer|min:0',
            'commission_rates' => 'required|integer|min:0|max:100',
            'user_id' => 'required|exists:users,id',
            'item_name' => 'required|exists:storages,item_name',
        ];
    }
}
