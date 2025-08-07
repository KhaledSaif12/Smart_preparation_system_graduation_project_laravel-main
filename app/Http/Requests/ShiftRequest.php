<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShiftRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type'=>'required|string',
            'from_time'=>'required',
            'to_time'=>'required',
            'total_hours'=>'required',
            'status'=>'required',

        ];
    }
    public function messages()
    {
        return[

            'type.required'=>'يجب كتابه نوع الفتره',
            'type.string'=>'عذرا لايمكن ادخال بيانات غير الاحرف!',
            'from_time.required'=>'يجب تحديد بدايه الفتره',
            'to_time.required'=>'يجب تحديد نهايه الفتره',
            'total_hours.required'=>'عذرا هذا الحقل مطلوب !',
            'status.required'=>'يجب تحديد حاله الفتره',
        ];
    }
}
