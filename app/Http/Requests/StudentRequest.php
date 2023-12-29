<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255',
            'username' => 'required|min:3|max:20|alpha_num',
            'date' => 'required|date|before_or_equal:today',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return
        //
        // 'name.required'=>'this',
        // 'name.min'=>'thi000000s',

        ['username.required' => 'Username is required.',
            'username.min' => 'Username must be at least :min characters.',
            'username.max' => 'Username must not exceed :max characters.',
            'username.alpha_num' => 'Username can only contain letters and numbers.',

            'date.required' => 'Date is required.',
            'date.date' => 'Please enter a valid date.',
            'date.before_or_equal' => 'Date cannot be in the future.',
        ];
    }
}
