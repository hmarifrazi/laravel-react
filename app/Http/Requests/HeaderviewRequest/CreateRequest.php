<?php

namespace App\Http\Requests\HeaderviewRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'link' => 'required',
            'image' => 'required',
            'whatsapp' => 'required',
            'contact' => 'required',
            'email' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'The :attribute field is required'
        ];
    }
}
