<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskCreateRequest extends FormRequest
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
            'task_name' => ['required', 'string', 'max:100'],
            'user_id' => ['required'],
            'start_date' => ['required', 'after:yesterday'],
            'deadline' => ['required', 'after:yesterday'],
            'task_status_id' => ['required'],
        ];
    }
}
