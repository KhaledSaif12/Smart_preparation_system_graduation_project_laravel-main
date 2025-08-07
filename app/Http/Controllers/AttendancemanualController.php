<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon; // تأكد من استيراد Carbon

class AttendancemanualController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('attendance-manual', compact('employees'));
    }


    public function fetchData()
    {
        $attendances = Attendance::with('employee')->get();

        $data = $attendances->map(function ($attendance) {
            return [
                'name' => $attendance->employee->name,
                'phone_number' => $attendance->employee->phone_number,
                'StrTime' => $attendance->StrTime,
                'Similarity' => $attendance->Similarity,
                'Glasses' => $attendance->Glasses,
                'TempFDIDString' => $attendance->TempFDIDString,
                'TempPIDString' => $attendance->TempPIDString,
                'image' => $attendance->employee->image,
            ];
        });

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $employee = Employee::find($request->input('employee_id'));

        $attendance = new Attendance();
        $attendance->ImageUrl = $employee->image; // حفظ مسار الصورة في ImageUrl
        $attendance->DownloadedImagePath = $employee->image; // حفظ مسار الصورة في DownloadedImagePath
        $attendance->Similarity = $request->input('similarity');
        $attendance->Glasses = $request->input('glasses');
        $attendance->TempFDIDString = $request->input('fdid');
        $attendance->TempPIDString = $request->input('pid');

        // تحويل الوقت إلى التنسيق المناسب
        $attendance->StrTime = Carbon::parse($request->input('StrTime'))->format('Y-m-d H:i:s');

        $attendance->save();

        return redirect()->route('attendance.show')
                         ->with('success', 'لقد تم تحضير الموظف بنجاح')
                         ->with('employee_id', $employee->id);
    }


}
