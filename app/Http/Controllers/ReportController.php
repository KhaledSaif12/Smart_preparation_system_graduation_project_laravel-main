<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function show()
    {
        // Step 1: Retrieve attendance records
        $reports = DB::table('attendance')
            ->join('employees', function($join) {
                $join->on('attendance.TempPIDString', '=', 'employees.FPID')
                     ->on('attendance.TempFDIDString', '=', 'employees.FDID');
            })
            ->join('departments', 'employees.department_id', '=', 'departments.id')
            ->join('shifts', 'employees.period_id', '=', 'shifts.id')
            ->select(
                'employees.name as name',
                'departments.name as department_name',
                DB::raw('DATE(attendance.StrTime) as attendance_date'),
                'attendance.StrTime as time',
                'shifts.from_time',
                'shifts.to_time',
                'shifts.type as shift_type',
                DB::raw('CASE
                            WHEN employees.period_id = 2 THEN CONCAT(DATE(attendance.StrTime), " 07:00:00")
                            WHEN employees.period_id = 3 THEN CONCAT(DATE(attendance.StrTime), " 14:00:00")
                         END as shift_start_time'),
                DB::raw('CASE
                    WHEN attendance.StrTime = MIN(attendance.StrTime) OVER (PARTITION BY employees.FPID, DATE(attendance.StrTime))
                    THEN ABS(TIMESTAMPDIFF(MINUTE,
                        CASE
                            WHEN employees.period_id = 2 THEN CONCAT(DATE(attendance.StrTime), " 07:00:00")
                            WHEN employees.period_id = 3 THEN CONCAT(DATE(attendance.StrTime), " 14:00:00")
                        END, attendance.StrTime))
                    ELSE NULL
                END as delay_time'),
                DB::raw('CASE
                            WHEN attendance.StrTime = MIN(attendance.StrTime) OVER (PARTITION BY employees.FPID, DATE(attendance.StrTime)) THEN "حضور"
                            WHEN attendance.StrTime = MAX(attendance.StrTime) OVER (PARTITION BY employees.FPID, DATE(attendance.StrTime)) THEN "انصراف"
                         END as attendance_status')
            )
            ->orderBy('attendance.StrTime')
            ->get();

        // Step 2: Generate all dates from the start of the month to today
        $startDate = now()->startOfMonth();
        $endDate = now()->endOfDay(); // Only include dates up to today
        $allDates = [];
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $allDates[] = $date->toDateString();
        }

        $absentEmployees = collect();

        foreach ($allDates as $date) {
            $absentEmployeesForDate = DB::table('employees')
                ->leftJoin('attendance', function($join) use ($date) {
                    $join->on('attendance.TempPIDString', '=', 'employees.FPID')
                         ->on('attendance.TempFDIDString', '=', 'employees.FDID')
                         ->whereDate('attendance.StrTime', '=', $date);
                })
                ->join('departments', 'employees.department_id', '=', 'departments.id')
                ->join('shifts', 'employees.period_id', '=', 'shifts.id')
                ->whereNull('attendance.StrTime')
                ->whereRaw('shifts.from_time <= ?', [$date . ' 23:59:59'])
                ->select(
                    'employees.name as name',
                    'departments.name as department_name',
                    DB::raw('"' . $date . '" as attendance_date'),
                    DB::raw('NULL as time'),
                    'shifts.from_time',
                    'shifts.to_time',
                    'shifts.type as shift_type',
                    DB::raw('NULL as delay_time'),
                    DB::raw('"غائب" as attendance_status')
                )
                ->distinct()
                ->get();

            $absentEmployees = $absentEmployees->merge($absentEmployeesForDate);
        }

        // Step 3: Merge reports with absent employees
        $mergedReports = $reports->merge($absentEmployees);

        // Step 4: Sort reports with absent employees at the bottom
        $sortedReports = $mergedReports->sortBy([
            fn($report) => $report->attendance_status == 'غائب',
            fn($report) => $report->attendance_date,
            fn($report) => $report->time
        ]);

        return view('report')->with('reports', $sortedReports);
    }








    //for detailsreport
    public function Showdetails()
    {
        // Step 1: Retrieve attendance records
        $reports = DB::table('attendance')
            ->join('employees', function($join) {
                $join->on('attendance.TempPIDString', '=', 'employees.FPID')
                     ->on('attendance.TempFDIDString', '=', 'employees.FDID');
            })
            ->join('departments', 'employees.department_id', '=', 'departments.id')
            ->join('shifts', 'employees.period_id', '=', 'shifts.id')
            ->select(
                'employees.name as name',
                'departments.name as department_name',
                DB::raw('DATE(attendance.StrTime) as attendance_date'),
                'attendance.StrTime as time',
                'shifts.from_time',
                'shifts.to_time',
                'shifts.type as shift_type',
                DB::raw('CASE
                            WHEN employees.period_id = 2 THEN CONCAT(DATE(attendance.StrTime), " 07:00:00")
                            WHEN employees.period_id = 3 THEN CONCAT(DATE(attendance.StrTime), " 14:00:00")
                         END as shift_start_time'),
                DB::raw('CASE
                    WHEN attendance.StrTime = MIN(attendance.StrTime) OVER (PARTITION BY employees.FPID, DATE(attendance.StrTime))
                    THEN ABS(TIMESTAMPDIFF(MINUTE,
                        CASE
                            WHEN employees.period_id = 2 THEN CONCAT(DATE(attendance.StrTime), " 07:00:00")
                            WHEN employees.period_id = 3 THEN CONCAT(DATE(attendance.StrTime), " 14:00:00")
                        END, attendance.StrTime))
                    ELSE NULL
                END as delay_time'),
                DB::raw('CASE
                            WHEN attendance.StrTime = MIN(attendance.StrTime) OVER (PARTITION BY employees.FPID, DATE(attendance.StrTime)) THEN "حضور"
                            WHEN attendance.StrTime = MAX(attendance.StrTime) OVER (PARTITION BY employees.FPID, DATE(attendance.StrTime)) THEN "انصراف"
                         END as attendance_status')
            )
            ->orderBy('attendance.StrTime')
            ->get();

        // Step 2: Generate all dates from the start of the month to today
        $startDate = now()->startOfMonth();
        $endDate = now()->endOfDay(); // Only include dates up to today
        $allDates = [];
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $allDates[] = $date->toDateString();
        }

        $absentEmployees = collect();

        foreach ($allDates as $date) {
            $absentEmployeesForDate = DB::table('employees')
                ->leftJoin('attendance', function($join) use ($date) {
                    $join->on('attendance.TempPIDString', '=', 'employees.FPID')
                         ->on('attendance.TempFDIDString', '=', 'employees.FDID')
                         ->whereDate('attendance.StrTime', '=', $date);
                })
                ->join('departments', 'employees.department_id', '=', 'departments.id')
                ->join('shifts', 'employees.period_id', '=', 'shifts.id')
                ->whereNull('attendance.StrTime')
                ->whereRaw('shifts.from_time <= ?', [$date . ' 23:59:59'])
                ->select(
                    'employees.name as name',
                    'departments.name as department_name',
                    DB::raw('"' . $date . '" as attendance_date'),
                    DB::raw('NULL as time'),
                    'shifts.from_time',
                    'shifts.to_time',
                    'shifts.type as shift_type',
                    DB::raw('NULL as delay_time'),
                    DB::raw('"غائب" as attendance_status')
                )
                ->distinct()
                ->get();

            $absentEmployees = $absentEmployees->merge($absentEmployeesForDate);
        }

        // Step 3: Merge reports with absent employees
        $mergedReports = $reports->merge($absentEmployees);

        // Step 4: Calculate absent days
        $absentDaysCount = $absentEmployees->groupBy('name')->map(function ($employee) {
            return $employee->count();
        });

        // Step 5: Sort reports with absent employees at the bottom and add absent_days
        $sortedReports = $mergedReports->map(function ($report) use ($absentDaysCount) {
            $report->absent_days = $absentDaysCount->get($report->name, 0);
            return $report;
        })->sortBy([
            fn($report) => $report->attendance_status == 'غائب',
            fn($report) => $report->attendance_date,
            fn($report) => $report->time
        ]);

        return view('detailsreport')->with('reports', $sortedReports)->with('total_absent', $absentEmployees->unique('name')->count());
    }








}
