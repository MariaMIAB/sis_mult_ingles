<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'surname' => ['required', 'max:255'],
            'profile_picture' => 'dimensions:min_width=200,max_width=500,min_height=200,max_height=500',
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users')->ignore($this->route('user')->id)
            ],

        ];
    }
}
