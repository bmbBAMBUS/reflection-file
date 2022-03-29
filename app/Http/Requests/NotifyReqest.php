<?php

namespace App\Http\Requests;

use App\Notifications\Resolvers\Resolver;
use App\Notifications\Validators\Validator;
use Illuminate\Foundation\Http\FormRequest;

class NotifyReqest extends FormRequest
{

    private $subjectRules = [
        'subject' => 'required|exists:actions,action',
    ];

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
        if(!$this->request->get('subject')) {
            return $this->subjectRules;
        }
        $validator = Resolver::for(Resolver::VALIDATOR)
            ->resolve(
                subject: $this->request->get('subject'),
                payload: $this->all('payload')
            );

        return array_merge($validator->rules(), $this->subjectRules);
    }
}
