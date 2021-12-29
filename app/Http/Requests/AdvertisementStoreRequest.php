<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Advertisement;

class AdvertisementStoreRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:50|min:4',
            'desc' => 'required|string|max:250|min:7',
            'adress' => 'required|max:50',
            'price' => 'size:3-5',
            'mobileNo' => 'size:12',
            'category' => 'between:1,12',
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
