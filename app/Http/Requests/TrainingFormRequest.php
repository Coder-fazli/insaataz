<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingFormRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
    }
}
