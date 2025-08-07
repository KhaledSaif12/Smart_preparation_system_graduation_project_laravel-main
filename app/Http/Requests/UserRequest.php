<?php

namespace App\Http\Requests;

use App\Exceptions\ApiFailedException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required | string ',
            'email' => 'required | email | unique:users',
            'password' => 'required | confirmed',
            'role' => 'required',
        ];
    }

    public function messages()
    {
        return[

            'name.required'=>'لايمكن ان يكون هذا الحقل فارغا',
            'name.string'=>'عذرا لايمكن ادخال بيانات غير الاحرف!',
            'email.required'=>'لايمكن ان يكون هذا الحقل فارغا',
            'email.email'=>'يجب ادخال ايميل وليس مجبر',
            'email.unique'=>' عذرا هذا الايميل وجود مسبقا !',
            'password.required'=>'لايمكن ان يكون هذا الحقل فارغا',
            'role.required'=>'لايمكن ان يكون هذا الحقل فارغا',
        ];
    }
    /**
     * Handle a failed validation attempt for API.
     */
    protected function failedValidation(Validator $validator)
    {
        if (request()->is('api/*')) {
            throw new ApiFailedException($validator->errors());
        }
    }
}
