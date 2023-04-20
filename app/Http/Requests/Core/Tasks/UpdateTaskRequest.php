<?php

namespace App\Http\Requests\Core\Tasks;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:100',
            'description' => 'string|max:255',
            'due_date' => 'date|after_or_equal:today',
            'status_id' => 'numeric|exists:statuses,id'
        ];
    }
}
