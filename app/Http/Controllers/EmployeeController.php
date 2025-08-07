<?php

namespace App\Http\Controllers;

use App\Enums\Genders;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\FDID;
use App\Models\User;
use App\Models\Shift;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Auth;
use DataTables;


/*use Illuminate\Support\Facades\Auth;*/


class EmployeeController extends Controller
{


    //
    /*
    public function create()
    {
        $dept_id = Department::get();
        $fdid_id = FDID::get();
        $period = Shift::get();


        return view('employees.create_employee', ['Genders' => Genders::array(), 'fdid_id' => $fdid_id, 'periods' => $period, 'departments' => $dept_id]);
    }

    */




    public function index()
    {
        // Step 1: Determine current shift
        $currentTime = now();
        $currentShift = Shift::where('from_time', '<=', $currentTime)
                             ->where('to_time', '>=', $currentTime)
                             ->first();

        // Step 2: Calculate currently present employees for the current shift
        if ($currentShift) {
            $presentEmployeeCount = Attendance::whereDate('StrTime', Carbon::today())
                                              ->whereBetween(DB::raw('TIME(StrTime)'), [$currentShift->from_time, $currentShift->to_time])
                                              ->distinct('TempPIDString')
                                              ->count('TempPIDString');
        } else {
            $presentEmployeeCount = 0; // No current shift found
        }

        // Step 3: Count total employees
        $employeeCount = Employee::count();

        // Step 4: Count total shifts
        $shiftCount = Shift::count();

        // Step 5: Calculate currently late employees for the current shift
        if ($currentShift) {
            $lateEmployeeCount = Attendance::whereDate('StrTime', Carbon::today())
                                           ->where(DB::raw('TIME(StrTime)'), '>', $currentShift->to_time)
                                           ->distinct('TempPIDString')
                                           ->count('TempPIDString');
        } else {
            $lateEmployeeCount = 0; // No current shift found
        }

        // Step 6: Calculate employees who checked in today
        $employeesCheckedInToday = Attendance::whereDate('StrTime', Carbon::today())
                                             ->distinct('TempPIDString')
                                             ->count('TempPIDString');

        // Step 7: Calculate absent employees (total employees - checked in today)
        $absentEmployeeCount = $employeeCount - $employeesCheckedInToday;

        // Step 8: Get employees added in the last 3 days
        $recentEmployees = Employee::whereDate('created_at', '>=', Carbon::today()->subDays(3))
                                   ->orderBy('created_at', 'desc')
                                   ->get();

        return view('pages.dashboard', compact(
            'employeeCount',
            'presentEmployeeCount',
            'shiftCount',
            'lateEmployeeCount',
            'employeesCheckedInToday',
            'absentEmployeeCount',
            'recentEmployees'
        ));
    }








    public function create()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://192.168.0.105:80/ISAPI/Intelligent/FDLib',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'admin:Admin@123', // Replace with actual credentials
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        } else {
            $xml = simplexml_load_string($response);

            if ($xml !== false) {
                $fdids = [];
                foreach ($xml->children() as $item) {
                    $fdids[] = [
                        'id' => (string)$item->id,
                        'fdid' => (string)$item->FDID,
                        'name' => (string)$item->name,
                    ];
                }

                // Retrieve other data if needed
                $dept_id = Department::get();
                $period = Shift::get();

                return view('employees.create_employee', [
                    'Genders' => Genders::array(),
                    'fdids' => $fdids,
                    'periods' => $period,
                    'departments' => $dept_id
                ]);
            } else {
                echo "Failed to parse XML response.";
            }
        }

        curl_close($curl);
    }

    public function getempList(Request $request): mixed
    {
        $data = Employee::with('department', 'shift')->get();
        $hasManageUser = Auth::user()->can('manage_user');

        return Datatables::of($data)
        ->addColumn('period_id', function ($data) {
           // $shift = $data->shift->type;
            $badge = '';
            if ($badge=!null) {
                $badge = $data->shift->type;
            }

            return $badge;
        })
        ->addColumn('department_id', function ($data) {
           // $roles = $data->department->name;
            $badge = '';
            if ($badge=!null) {
                $badge = $data->department->name;                ;
            }

            return $badge;
        })


            ->addColumn('action', function ($data) use ($hasManageUser) {
                $user=User::get();
                $output = '';
                if ($data->name == ' Super Admin') {
                    return '';
                }
                if ($hasManageUser) {
                    $output = '<div class="table-actions">
                                <a href="' . url('edit/' . $data->id) . '" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="' . url('/delete_employee' . $data->id) . '"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }

                return $output;
            })
          //  ->rawColumns(['period_id','department_id','FDID','action'])
            ->make(true);
    }

    //uploadimage Employee
    /*public function UploadImage($image){
    $image_name=time(). '.' .$image->extension();
   $image->move(public_path('/images'),$image_name);
   return $image_name;
  }*/


  public function uploadd(Request $request)
  {
      // التحقق من البيانات المدخلة
      $request->validate([
          'fdid' => 'required|string',
          'name' => 'required|string',
          'sex' => 'required|string',
          'phoneNumber' => 'required|string',
          'importImage' => 'required|image'
      ]);

      // الحصول على قيم المدخلات من النموذج
      $fdid = $request->input('fdid');
      $name = $request->input('name');
      $sex = $request->input('sex');
      $phoneNumber = $request->input('phoneNumber');
      $image = $request->file('importImage');

      // التحقق من وجود رقم الهاتف في قاعدة البيانات
      $existingRecord = DB::table('employees')->where('phone_number', $phoneNumber)->first();
      if ($existingRecord) {
          return back()->with('error', 'الموظف موجود بالفعل في قاعدة البيانات.');
      }

      if ($image) {
          $originalFileName = $image->getClientOriginalName();
          $pictureUploadData = "<PictureUploadData><FDID>$fdid</FDID><FaceAppendData><name>$name</name><sex>$sex</sex><phoneNumber>$phoneNumber</phoneNumber></FaceAppendData></PictureUploadData>";

          $response = Http::withBasicAuth('admin', 'Admin@123')
              ->attach('importImage', file_get_contents($image->getPathname()), $originalFileName)
              ->post('http://192.168.0.105:80/ISAPI/Intelligent/FDLib/pictureUpload', [
                  'PictureUploadData' => $pictureUploadData,
              ]);

          if ($response->successful()) {
              // Assuming the PID is in an element <PID> in the response XML
              $xml = simplexml_load_string($response->body());
              $pid = (string) $xml->PID;
              return back()->with('success', 'لقد تم رفع البيانات بنجاح الى الجهاز ')
                           ->withInput($request->all())
                           ->with('pid', $pid)
                           ->with('image', $originalFileName);
          } else {
              return back()->with('error', 'Failed to upload image.');
          }
      } else {
          return back()->with('error', 'No image provided.');
      }
  }



  public function storee(Request $request)
  {
      try {
          // معالجة الصورة
          $file_extension = $request->image->getClientOriginalExtension();
          $file_name = time() . "." . $file_extension;
          $path = 'images';
          $request->image->move($path, $file_name);

          // إنشاء الموظف
          $employee = Employee::create([
              'name' => $request->name,
              'phone_number' => $request->phone_number,
              'job_number' => $request->job_number,
              'job_type' => $request->job_type,
              'gender' => $request->gender,
              'period_id' => $request->period_id,
              'Nationalit' => $request->Nationalit,
              'FPID' => $request->FPID,
              'FDID' => $request->FDID,
              'department_id' => $request->department_id,
              'image' => $file_name,
          ]);

          if ($employee->save()) {
              session(['pid' => $employee->FPID]);
              return back()->with('success', 'لقد تم اضافه بيانات الموظف بنجاح ' );
          }

          return redirect()->route('all_emp')->with('error', 'فشلت عمليه الاظافه يرجى المحاوله مره اخرى');
      } catch (\Exception $e) {
          $bug = $e->getMessage();
          return redirect()->back()->with('error', $bug);
      }
  }



    // Dispaly All Employees
    public function All_Employees()
    {
        $list = Employee::with('department', 'shift', 'fdid')->get();
        //$hasManageUser = Auth:: user()->can('manage_user');;
        // return DataTable::of($list);
        return view('employees.All_Employees',['data'=>$list]);
    }

    // Edit Employees info
    public function edit($id): mixed
    {

        try {
            $emp = Employee::with(['department', 'FDID', 'shift'])->find($id); // داله الفايند تشيك فقط ع الاي بي لايمكن اطتب الاسم او الرقم مثلا
            //  $dept_id= Departments::get();
            //    return response($emps);

            if ($emp) {
                $emp_dept = $emp->department->name;
                $departments = Department::get();
                $emp_per = $emp->shift->type;
                $period = Shift::get();


                return view('employees.edit_employee', compact('emp', 'departments', 'emp_dept', 'emp_per'))->with(['Genders' => Genders::array(), 'periods' => $period]);
            }

            return redirect('404');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->withInput()->with('error', $bug);
        }
    }

    // Edit Employees info
    public function show($employee): mixed
    {

        try {
            $index = Employee::find($employee)->with(['department', 'FDID', 'shift']);
            //$list = Employee::get();
            //    return response($emps);
            if($index===false)
            {
                abort(404);
            }
            return view('employees.show',['employee'=>$index]);
            //return view('show', compact('emp'));


            return redirect('404');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }
    // Update Employee Info


    public function update(Request $request): RedirectResponse
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:employees,id',
            'name' => 'required|string',
            'phone_number' => 'required|numeric',
            'job_number' => 'required|numeric',
            'job_type' => 'required|string',
            'gender' => 'required|in:ذكر,انثى', // Gender validation
            'period_id' => 'required',
            'Nationalit' => 'required',
            'department_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $emp = Employee::find($request->id);

            if ($emp) {
                // Update Employee data in the database
                $emp->name = $request->name;
                $emp->phone_number = $request->phone_number;
                $emp->job_number = $request->job_number;
                $emp->job_type = $request->job_type;
                $emp->gender = $request->gender;
                $emp->period_id = $request->period_id;
                $emp->Nationalit = $request->Nationalit;
                $emp->department_id = $request->department_id;
                $emp->save();

                // Update Device data
                $username = 'admin';
                $password = 'Admin@123';
                $data = '<FaceAppendData>
                            <name>' . $request->name . '</name>
                            <sex>' . ($request->gender == 'ذكر' ? 'male' : 'female') . '</sex>
                            <phoneNumber>' . $request->phone_number . '</phoneNumber>
                        </FaceAppendData>';

                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => 'http://192.168.0.105:80/ISAPI/Intelligent/FDLib/' . $emp->FDID . '/picture/' . $emp->FPID,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
                    CURLOPT_USERPWD => $username . ':' . $password,
                    CURLOPT_CUSTOMREQUEST => 'PUT',
                    CURLOPT_POSTFIELDS => $data,
                    CURLOPT_HTTPHEADER => ['Content-Type: application/xml'],
                ]);

                $response = curl_exec($curl);
                $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                curl_close($curl);

                if ($http_code == 200) {
                    return redirect()->route('all_emp')->with('success', '!تم تعديل بيانات الموظف والجهاز بنجاح');
                } else {
                    $error_message = 'Failed to update device: ' . $response;
                    return redirect()->back()->withInput()->with('error', $error_message);
                }
            }

            return redirect()->back()->withInput()->with('error', 'حاول مره اخرى !خطأ في تعديل البيانات');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->withInput()->with('error', $bug);
        }
    }










    // Delete Employee
    public function destroy($id)
    {
        $username = 'admin';
        $password = 'Admin@123';

        try {
            $employee = Employee::findOrFail($id);
            $FDID = $employee->FDID;
            $PID = $employee->FPID;

            // Delete from database
            $employee->delete();

            // Delete from device
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://192.168.0.105:80/ISAPI/Intelligent/FDLib/' . $FDID . '/picture/' . $PID,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
                CURLOPT_USERPWD => $username . ':' . $password,
                CURLOPT_CUSTOMREQUEST => 'DELETE',
            ));

            $response = curl_exec($curl);
            $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            if ($statusCode !== 200) {
                throw new \Exception('فشل حذف الموظف من الجهاز. : ' . $response);
            }

            curl_close($curl);

            return redirect()->route('all_emp')->with('success', 'تم الحذف بنجاح');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }
}
