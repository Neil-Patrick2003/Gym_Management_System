<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
        $user = $this->post('user_id') ? User::find($this->post('user_id')) : null;

        return [
            'user_id' => ['required', 'exists:users,id'],
            'trainer_id' => $user?->is_paid_today ? ['required|numeric'] : ['numeric'],
            'trainer_hours' => $user?->is_paid_today ? ['required|numeric'] : ['numeric'],
            'plan' => $user?->is_paid_today ? ['nullable'] : ['required'],
            'student_discount' => 'nullable'
        ];
    }
}
