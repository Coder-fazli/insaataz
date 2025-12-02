<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{

    public function rules()
    {
        return [
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'sometimes',
            'message' => 'required'
        ];
    }
}
