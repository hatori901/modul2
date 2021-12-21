<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'class_id',
        'date',
        'topic'
    ];

    public function teacher(){
        return $this->belongsTo(User::class,'teacher_id');
    }
    public function subject(){
        return $this->belongsTo(Subjects::class,'subject_id');
    }
    public function kelas(){
        return $this->belongsTo(Classes::class,'class_id');
    }
}
