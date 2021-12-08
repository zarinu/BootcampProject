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
            'title' => 'required|string|max:50|min:8',
            'desc' => 'required|string|max:250|min:12',
            'adress' => 'required|max:50',
            'price' => 'size:3-5',
            'mobileNo' => 'size:12',
            'ccategory' => '1-12'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'title is required!',
            'desc.required' => 'description is required!',
            'adress.required' => 'adress is required!'
        ];
    }
}
