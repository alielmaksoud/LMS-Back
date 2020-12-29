<?php

namespace App\Http\Controllers;

use App\attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Attendance::all();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $attendance = new Attendance();
        $attendance->fill($data);
        $attendance->save();

        return response()->json([
            'status' => 200,
            'attendance'  => $attendance
        ]);    }

    /**
     * Display the specified resource.
     *
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(attendance $attendance)
    {
        return Attendance::where('id', $id)->first();

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attendance $attendance,$id)
    {
        $data = $request->all();
        
        $attendance = Attendance::where('id', $id)->first();
        $attendance->update($data);

        return response()->json([
            'status' => 200,
            'attendance'  => $attendance
        ]);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(attendance $attendance, $id)
    {
        Attendance::where('id', $id)->delete();
        return response()->json([
            'status' => 200,
            'message'  => 'Attendance record deleted'
        ]);    
    }
}
