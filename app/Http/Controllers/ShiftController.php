<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShiftRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\shift;
use DateTime;

class ShiftController extends Controller
{



    //All_Shifts
    public function index(){
        $list=Shift::get();

        //$hasManageUser = Auth:: user()->can('manage_user');;
       // return DataTable::of($list);
        return view('Shifts.All_Shift')->with('data',$list);

       }


       // Create Shift
       public function create()
       {
        return view('Shifts.add_shift');

       }

       //Store_Shift
    public function store(Request $request) {
      //return response($request);
        try{
       $shif= shift::create([
        'type' => $request->type,
        'from_time' =>$request->from_time,
        'to_time' =>$request->to_time,
        'total_hours' => $request->total_hours,
        'status' =>$request->status,
       ]);

      if ($shif->save())
      return redirect()->back()->with('success','تمت الاظافه بنجاح');
      return redirect()->back()->with('error', ' ! فشلت عمليه الاظافه يرجى المحاوله مره اخرى');

        }
        catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
       }

       //Edit Shift
       public function edit($id): mixed
    {
        try {
            $shif = Shift::find($id); // داله الفايند تشيك فقط ع الاي بي لايمكن اطتب الاسم او الرقم مثلا
            //    return response($emps);
            $sh= shift::get();
            if ($shif) {
               return view('Shifts.edit_shift',compact('shif','sh')) ;

            }

            return redirect('404');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->withInput()->with('error', $bug);
        }
    }

     // update shift info
    public function update(ShiftRequest $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string ',
            'from_time' => 'required|time',
            'to_time' => 'required|time  ',
            'total_hours' => 'required',
            'status' => 'required',

        ]);

        try {
            if ($shif = shift::find($request->id)) {
                    $payload = [
                        'type' => $request->type,
                        'from_time' => $request->from_time,
                        'to_time' => $request->to_time,
                        'total_hours' => $request->total_hours,
                        'status' => $request->status,

                    ];
                    $update = $shif->update($payload);
                    return redirect()->route('all_shift')->with('success', '!تم تعديل بيانات الفترة بنجاح');

                     }


            return redirect()->back()->withInput()->with('error', 'حاول مره اخرى !خطأ في تعديل البيانات');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->withInput()->with('error', $bug);
        }
    }

       // Delete Shift
       public function delete($id): RedirectResponse
       {
           try {
               if ($shif = shift::find($id)) {
                   $shif->delete();
                       return redirect()->route('all_shift')->with('success', 'تم الحذف بنجاح!');
               }

               return redirect()->route('all_shift')->with('error', 'عذرا الفترة غير موجوده');
           } catch (\Exception $e) {
               $bug = $e->getMessage();

               return redirect()->back()->with('error', $bug);
           }
       }

    public function calctotalhours()
    {
        $shift= new shift();
        $start=new DateTime($shift->from_time);
        $end= new DateTime($shift->to_time);
        if($shift->to_time && $shift->from_time =! null){
            $diff= $shift->to_time->date_diff($shift->from_time);
            $hours= $diff->h;
            return $hours;
        }
    }

}
