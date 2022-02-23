<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'weight_goal' => 'required',
            'workout_time' => 'required',
            'workout_time_per_week' => 'required',
            'workout_place' => 'required',
            'diet_type' => 'required',
        ];
    }
}
