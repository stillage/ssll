<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresenceConfigRequest extends FormRequest
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
            'time_in' => ['required'],['date_format:H:i:s'],
            'time_out' => ['required'],['date_format:H:i:s'],
            'tolerance_time_in' => ['required'],['numeric'],
            'tolerance_time_out' => ['required'],['numeric'],
        ];
    }
}
