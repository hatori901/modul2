<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttDetails extends Model
{
    use HasFactory;
    protected $table = "attdetails";
    protected $fillable = [
        'attendance_id',
        'student_id',
        'attstatus'
    ];
    public function absen(){
        return $this->belongsTo(Attendances::class,'attendance_id');
    }
    public function student(){
        return $this->belongsTo(User::class,'student_id');
    }
}
