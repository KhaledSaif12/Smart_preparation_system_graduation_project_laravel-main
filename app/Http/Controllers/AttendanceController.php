<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function show()
    {
        return view('attendance');
    }

    public function getAttendanceData()
    {
        $today = Carbon::today()->format('Y-m-d');
        $attendances = Attendance::whereDate('StrTime', $today)->get();

        $employeeDetails = [];
        foreach ($attendances as $attendance) {
            $employee = Employee::where('FDID', $attendance->TempFDIDString)
                                ->where('FPID', $attendance->TempPIDString)
                                ->first();

            if ($employee) {
                $relativeImageUrl = str_replace('C:\\FaceSnapshots\\', '', $attendance->ImageUrl);
                $employeeDetails[] = [
                    'id' => $attendance->id, // Ensure this ID is included
                    'name' => $employee->name,
                    'phone_number' => $employee->phone_number,
                    'StrTime' => $attendance->StrTime,
                    'ImageUrl' => $relativeImageUrl,
                    'DownloadedImagePath' => $attendance->DownloadedImagePath,
                    'Similarity' => $attendance->Similarity,
                    'Nationalit' => $employee->Nationalit,
                    'image' => $employee->image,
                    'Glasses' => $attendance->Glasses,
                ];
            }
        }

        return response()->json($employeeDetails);
    }

    public function deleteAttendance($id)
    {
        $attendance = Attendance::find($id);

        if ($attendance) {
            $attendance->delete();
            return response()->json(['success' => 'تم الحذف بنجاح']);
        }

        return response()->json(['error' => 'تعذر العثور على السجل'], 404);
    }
}
