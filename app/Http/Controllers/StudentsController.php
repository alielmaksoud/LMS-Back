<?php

namespace App\Http\Controllers;

use App\students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return Students::all();

        // $students = students::with('GetAttendance')->get();
        // dd($students);
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
        $student = new Students();
        $student->fill($data);
        $student->student_id = $data['first_name'] . $data['phone'];
        $student->save();

        return response()->json([
            'status' => 200,
            'student'  => $student
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(students $students)
    {
        return Admins::where('id', $id)->first();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, students $students, $id)
    {
        $data = $request->all();
        
        $student = Students::where('id', $id)->first();
        $student->update($data);

        return response()->json([
            'status' => 200,
            'student'  => $student
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(students $students, $id)
    {
        Students::where('id', $id)->delete();
        return response()->json([
            'status' => 200,
            'message'  => 'Student profile deleted'
        ]);  
    }
}
