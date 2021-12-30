<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Advertisement;
use Illuminate\Support\Str;

class AdvertisementStoreRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // this was just for test and i don't want remove these lines
        // $this->merge([
        //     'mobileNo' => $this->mobileNo . 'lala',
        // ]);
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
            'price' => 'max:11|min:4',
            'mobileNo' => 'max:13|min:10',
            'category_id' => 'between:1,12',
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
