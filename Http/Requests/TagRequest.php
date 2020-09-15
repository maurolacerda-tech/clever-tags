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
        $method = $this->method();
        if( strtoupper($method)=='POST'){
            return [
                'name'  => 'nullable|max:191',
                'menu_id' => "required|numeric",
                'slug' => "required|max:191|unique:tags,slug"
            ];
        }else{
            $id = $this->request->get('id');
            return [
                'name'  => 'nullable|max:191',
                'menu_id' => "required|numeric",
                'slug' => "required|max:191|unique:tags,slug,{$id},id"
            ];
        }
    }
}