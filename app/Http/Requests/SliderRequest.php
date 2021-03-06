<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [

            'title_one' => 'required|string|max:255',
            'title_two' => 'required|string|max:255',
            'video' => 'nullable|string|max:255',
        ];

        if ($this->getMethod() == 'POST') {

            return $rules + [
                'photo'    => 'mimes:jpeg,jpg,png,gif,webp|max:1000|required',
            ];
        } else {

            return $rules + [
                'photo'    => 'mimes:jpeg,jpg,png,gif,webp|max:100|nullable',
            ];
        }
    }
}
