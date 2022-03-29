<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'action_id' => 'required_without:action|exists:actions,id',
            'action' => 'required_without:action_id|exists:actions,action',
            'email' => 'required|boolean',
            'sms'   => 'required|boolean',
            'browser' => 'required|boolean',
            'email_receiver' => 'sometimes|email',
            'phone_receiver' => 'sometimes|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ];
    }
}
