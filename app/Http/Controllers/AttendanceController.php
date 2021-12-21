<?php

namespace App\Http\Controllers;

use App\Models\AttDetails;
use App\Models\Attendances;
use App\Models\Classes;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role != "Guru"){
            abort(404,'Not Found');
        }
        $data['classes'] = Classes::get();
        $data['subjects'] = Subjects::get();
        return view("guru.tambahabsen",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'subject' => 'required',
            'class' => 'required',
            'topic' => 'required'
        ]);
        Attendances::create([
            'teacher_id' => Auth::user()->id,
            'subject_id' => $request->subject,
            'class_id' => $request->class,
            'date' => date('Y-m-d'),
            'topic' => $request->topic
        ]);

        return redirect()->route('dashboard')->with('success','Berhasul Menambah Prensensi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->role != "Guru"){
            abort(404,'Not Found');
        }
        $data['absen'] = Attendances::with(['teacher','subject','kelas'])->where('id',$id)->first();
        $data['absens'] = AttDetails::with(['absen','student'])->where('attendance_id',$id)->get();
        return view('guru.lihatabsen',$data);
    }
    public function export($id){
        $data['absen'] = Attendances::with(['teacher','subject','kelas'])->where('id',$id)->first();
        $data['absens'] = AttDetails::with(['student','absen'])->where('attendance_id',$id)->get();
        return view('guru.export',$data);
    }
    public function absen($id){
        if(Auth::user()->role != "Siswa"){
            abort(404,'Not Found');
        }
        $data['absen'] = Attendances::with(['teacher','subject','kelas'])->where('id',$id)->first();
        return view("siswa.absensi",$data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = AttDetails::where('id',$id)->where('student_id',Auth::user()->id);
        if($data->count() > 0){
            $data->update([
                'attstatus' => $request->kehadiran
            ]);
            return redirect()->route('siswa.absen',$id)->with('success','Berhasil mengubah status kehadiran');
        }else{
            AttDetails::create([
                'attendance_id' => $id,
                'student_id' => Auth::user()->id,
                'attstatus' => $request->kehadiran
            ]);
            return redirect()->route('siswa.absen',$id)->with('success','Berhasil menyimpan status kehadiran');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Attendances::find($id);
        $data->delete();

        return redirect()->route('dashboard')->with('success','Berhasil menghapus Presensi');
    }
}
