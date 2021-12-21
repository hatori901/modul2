<?php

namespace App\Http\Controllers;

use App\Models\AttDetails;
use App\Models\Attendances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->role == "Guru"){
            $data['attendances'] = Attendances::with(['teacher','subject','kelas'])->where('date',date('Y-m-d'))->get();
        }else{
            $data['attendances'] = Attendances::with(['teacher','subject','kelas'])->where('class_id',Auth::user()->class_id)->get();
            $data['hadir'] = AttDetails::where('student_id',Auth::user()->id)->where('attstatus','Hadir')->count();
            $data['sakit'] = AttDetails::where('student_id',Auth::user()->id)->where('attstatus','Sakit')->count();
            $data['izin'] = AttDetails::where('student_id',Auth::user()->id)->where('attstatus','Izin')->count();
            $data['tanket'] = AttDetails::where('student_id',Auth::user()->id)->where('attstatus','Tanpa Keterangan')->count();
        }
        return view('dashboard',$data);
    }
}
