<?php

namespace App\Http\Controllers;

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
        }
        return view('dashboard',$data);
    }
}
