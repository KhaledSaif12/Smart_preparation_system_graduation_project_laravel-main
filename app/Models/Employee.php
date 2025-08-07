<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    use HasRoles;

    protected $fillable=['name','phone_number','job_number','job_type','gender','period_id','Nationalit','FPID','FDID','department_id','image'];
    //   protected $guarded=[];   نفس الي فوق لاكم هاذه تسمح بادخال بيانات لاي حقل في القاعده من دون مااحدد الاعمده واحد واحد لاكن لاينصح بها ابدا
    // protected $guarded=[FDID]; FDID هذه يعني اسمح بادخال بيانات لكل الحقول ماعدا حقل  
     public function department(){
         return $this->belongsTo(Department::class,'department_id');
 
     }
     public function shift(){
         return $this->belongsto(Shift::class,'period_id');
 
     }
 
    
    public function fdid ()
    {
        return $this->belongsTo(FDID::class,'FDID');
    }
}
