<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCallRequest extends FormRequest
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
            'user' => 'required|string',
            'client' => 'required|string',
            'client_type' => 'required|string',
            'date' => 'required|date',
            'duration' => 'required|numeric',
            'type_of_call' => 'required|string',
            'external_call_score' => 'required|numeric'
        ];
    }
}
