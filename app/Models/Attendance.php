<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';

    protected $fillable = [
        'ImageUrl', 'DownloadedImagePath', 'StrTime', 'Similarity', 'SnapFacePicID', 'TempFDIDString', 'TempPIDString', 'Glasses',
    ];

    public function employee()
{
    return $this->belongsTo(Employee::class, 'TempPIDString', 'TempFDIDString');
}
}
