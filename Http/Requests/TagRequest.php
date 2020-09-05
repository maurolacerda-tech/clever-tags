<?php

namespace Modules\Tags\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'  => 'nullable|max:191'
        ];
    }
}