<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;
    protected $fillable=['name','phone_number','job_number','gender','period','Nationalit','FPID','FDID','department_id','image'];

    public function employee_audi(){
        return $this->belongsTo(Employee::class,'employee_id');

    }
}
