<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Advertisement;

class AdeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $nana = Advertisement::find($this->route('adID'));
        // dd($nana->id);
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd("lsafl");
        return [
            'title' => 'required|email|unique:users',
            'desc' => 'required|string|max:50',
            'adress' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'title is required!',
            'desc.required' => 'Name is required!',
            'adress.required' => 'Password is required!'
        ];
    }
}
