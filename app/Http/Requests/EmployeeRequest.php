<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name'=>'required|string',
            'phone_number'=>'required|number|unique:Employees',
            'job_number'=>'required',
            'job_type'=>'required',
            'gender'=>'required',
            'period_id'=>'required',
            'Nationalit'=>'required',
            'FPID'=>'required',
            'FDID'=>'required',
            'department_id'=>'required',
            'image'=>'required',




        ];
    }
    public function messages()
    {
        return[

            'name.required'=>'لايمكن ان يكون هذا الحقل فارغا',
            'name.string'=>'عذرا لايمكن ادخال بيانات غير الاحرف!',
            'phone_number.required'=>'لايمكن ان يكون هذا الحقل فارغا',
            'phone_number.number'=>'يجب ان تكون البيانات ارقاما',
            'job_number.required'=>'عذرا هذا الحقل مطلوب !',
            'job_type.required'=>'يجب تحديد نوع الوظيفه',
            'gender.required'=>'لايمكن ان يكون هذا الحقل فارغا',
            'period_id.required'=>'لايمكن ان يكون هذا الحقل فارغا',
            'Nationalit.required'=>'لايمكن ان يكون هذا الحقل فارغا',
            'FPID.required'=>'لايمكن ان يكون هذا الحقل فارغا',
            'FDID.required'=>'لايمكن ان يكون هذا الحقل فارغا',
            'department_id.required'=>'لايمكن ان يكون هذا الحقل فارغا',
            'image.required'=>'لايمكن ان يكون هذا الحقل فارغا',






        ];
    }
}
