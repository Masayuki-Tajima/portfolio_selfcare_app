<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConditionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sleep_time' => 'required',
            'wakeup_time' => 'required',
            'exercise' => 'required|max:255',
            'breakfast' => 'required|max:255',
            'lunch' => 'required|max:255',
            'dinner' => 'required|max:255',
            'comment' => 'required|max:65535',
        ];
    }
}
