<?php

namespace App\Http\Requests\Member;

use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CreateAppointmentRequest extends FormRequest
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
            'trainer_id' => ['required', 'exists:users,id'],
            'start_time' => 'required|date',
            'end_time'   => 'required|date|after:start_time',
        ];
        
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $start_time = Carbon::parse($this->post('start_time'));
                $end_time = Carbon::parse($this->post('end_time'));

                $duration = $start_time->diffInHours($end_time);

                if ($duration >= 3) {
                    $validator->errors()->add(
                        'end_time',
                        'Appointments cannot be longer than 3 hours.'
                    );
                }

                $hasAppointment = Appointment::where('trainer_id',
                    $this->post('trainer_id'))
                    ->whereNot('status', 'Denied')
                    ->where(function ($query) {
                        $query->whereBetween('start_time', [
                            $this->post('start_time'), $this->post('end_time')
                        ])
                            ->orWhereBetween('end_date', [
                                $this->post('start_time'),
                                $this->post('end_time')
                            ])
                            ->orWhere(function ($query) {
                                $query->where('start_time', '<=',
                                    $this->post('start_time'))
                                    ->where('end_date', '>=',
                                        $this->post('end_time'));
                            });
                    })
                    ->exists();

                if ($hasAppointment) {
                    $validator->errors()->add(
                        'trainer_id',
                        'Trainer is not available during this time'
                    );
                }
            }
        ];
    }
}
