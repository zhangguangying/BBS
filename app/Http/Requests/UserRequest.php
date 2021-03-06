<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id() . ',id',
            'email' => 'required|email',
            'introduction' => 'max:80',
            'avatar' => 'mimes:jpeg,png,gif,bmp|dimensions: min_width=200,min_height=200'
        ];
    }

    public function messages()
    {
        return [
            'avatar.mimes' => '图片格式不对',
            'avatar.dimensions' => '图片清晰度不够，宽高需在200px以上',
        ];
    }
}
