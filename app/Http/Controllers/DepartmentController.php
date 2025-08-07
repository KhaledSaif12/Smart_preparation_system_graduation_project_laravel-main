<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Department;
use Illuminate\Support\Facades\Validator;
use Auth;
use DataTables;

class DepartmentController extends Controller
{
    public function index(){
        $data=Department::get();
        return view('departments',['all_dept'=>$data]);
    }

    public function store(Request $request){
        $dept=new Department();
        $dept->name=$request->name;
        $dept->description=$request->description;
      if($dept->save())
        return redirect()->route('department')->with('success','تمت الاضافه بنجاح');
        return redirect()->back();

    }
    public function create()
    {
        return view('add_department');
    }

    public function edit($id)
    {
     //   return redirect()->back()->with('success','edit sucsessfly');
        try {
            $dep = Department::get()-> find($id);
            // داله الفايند تشيك فقط ع الاي بي لايمكن اطتب الاسم او الرقم مثلا
            //    return response($dep);
            if ($dep) {
               return view('edit_department',compact('dep')) ;

            }

            return redirect('404');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->withInput()->with('error', $bug);
        }

    }

    public function update(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string ',
        ]);

        try {
            if ($depart = Department::find($request->id)) {
                    $payload = [
                        'name' => $request->name,
                        'description' => $request->description,
                    ];

                    $update = $depart->update($payload);
                    return redirect()->route('department')->with('success', '!تم تعديل بيانات القسم بنجاح');

                     }


            return redirect()->back()->withInput()->with('error', 'حاول مره اخرى !خطأ في تعديل البيانات');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->withInput()->with('error', $bug);
        }
    }

        // Delete Department
        public function delete($id)
        {
            $depart = Department::find($id);

            if ($depart) {
                $depart->delete();
                return redirect()->route('department')->with('success', 'تم الحذف بنجاح!');
            }

            return redirect()->route('department')->with('error', 'عذرا القسم ليس موجود');
        }



        public function getdeptList(Request $request): mixed
        {
            $data = Department::get();
            $hasManageUser = Auth::user()->can('manage_user');

            return Datatables::of($data)
            ->addColumn('name', function ($data) {
               // $shift = $data->shift->type;
                $badge = '';
                if ($badge=!null) {
                    $badge =$data->name;
                }

                return $badge;
            })
            ->addColumn('description', function ($data) {
               // $roles = $data->department->name;
                $badge = '';
                if ($badge=!null) {
                    $badge =$data->description;                ;
                }

                return $badge;
            })


                ->addColumn('action', function ($data) use ($hasManageUser) {
                    $output = '';
                    if ($data->name == 'Super Admin') {
                        return '';
                    }
                    if ($hasManageUser) {
                        $output = '<div class="table-actions">
                                    <a href="' . url('edit_department/' . $data->id) . '" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                    <a href="' . url('delete_department/' . $data->id) . '"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                </div>';
                    }

                    return $output;
                })
               // ->rawColumns(['action','description','name'])
                ->make(true);
        }

    }




