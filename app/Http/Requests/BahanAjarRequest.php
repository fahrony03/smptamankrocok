<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BahanAjarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'     => ['required'],
            'file'     => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'title.required'     => 'Title tidak boleh kosong.',
            'file.required'     => 'File tidak boleh kosong.',
        ];
    }
}
