<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CleanupAttendance
{
    public function handle($request, Closure $next)
    {
        $this->cleanAttendance();
        return $next($request);
    }

    private function cleanAttendance()
    {
        $today = Carbon::today()->format('Y-m-d');

        // احصل على جميع الموظفين من جدول الحضور
        $employees = Attendance::select('TempFDIDString', 'TempPIDString')
                               ->distinct()
                               ->get();

        foreach ($employees as $employee) {
            // احصل على أقل وأكبر وقت لكل موظف بصيغة 24 ساعة لليوم الحالي
            $minTime24 = Attendance::where('TempFDIDString', $employee->TempFDIDString)
                                    ->where('TempPIDString', $employee->TempPIDString)
                                    ->whereDate('StrTime', $today)
                                    ->min('StrTime');
            $maxTime24 = Attendance::where('TempFDIDString', $employee->TempFDIDString)
                                    ->where('TempPIDString', $employee->TempPIDString)
                                    ->whereDate('StrTime', $today)
                                    ->max('StrTime');

            if ($minTime24 !== null && $maxTime24 !== null) {
                // تحويل الوقت إلى صيغة 12 ساعة باستخدام Carbon
                $minTime12 = Carbon::parse($minTime24)->format('h:i:s A');
                $maxTime12 = Carbon::parse($maxTime24)->format('h:i:s A');

                // إيجاد معرفات السجلات الأولى والأخيرة في كلا التنسيقين لكل موظف لليوم الحالي
                $minID24 = Attendance::where('TempFDIDString', $employee->TempFDIDString)
                                      ->where('TempPIDString', $employee->TempPIDString)
                                      ->where('StrTime', $minTime24)
                                      ->value('id');
                $maxID24 = Attendance::where('TempFDIDString', $employee->TempFDIDString)
                                      ->where('TempPIDString', $employee->TempPIDString)
                                      ->where('StrTime', $maxTime24)
                                      ->orderBy('id', 'desc')
                                      ->value('id');

                $minID12 = Attendance::where('TempFDIDString', $employee->TempFDIDString)
                                      ->where('TempPIDString', $employee->TempPIDString)
                                      ->where(DB::raw("DATE_FORMAT(StrTime, '%h:%i:%s %p')"), $minTime12)
                                      ->value('id');
                $maxID12 = Attendance::where('TempFDIDString', $employee->TempFDIDString)
                                      ->where('TempPIDString', $employee->TempPIDString)
                                      ->where(DB::raw("DATE_FORMAT(StrTime, '%h:%i:%s %p')"), $maxTime12)
                                      ->orderBy('id', 'desc')
                                      ->value('id');

                // حذف السجلات التي ليست الأولى أو الأخيرة من حيث الوقت في كلا التنسيقين لكل موظف لليوم الحالي
                $idsToKeep = array_filter([$minID24, $maxID24, $minID12, $maxID12]);
                if (!empty($idsToKeep)) {
                    Attendance::where('TempFDIDString', $employee->TempFDIDString)
                              ->where('TempPIDString', $employee->TempPIDString)
                              ->whereDate('StrTime', $today)
                              ->whereNotIn('id', $idsToKeep)
                              ->delete();
                }
            }
        }
    }
}
