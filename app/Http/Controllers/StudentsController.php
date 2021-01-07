<?php

namespace App\Http\Controllers;

use App\students;
use App\classes;
use App\section;
use Illuminate\Http\Request;
use File;
use Storage;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return students::all();
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
            'file' => 'bail|required|mimes:jpg,png,Jpeg'
        ]);


        $data = $request->all();
        $imagename = $request['picture'].".".$request->file('file')->extension();
        $image = $request->file('file')->storeAs('students/avatars', $imagename);
        $student = new Students();
        $student->fill($data);
        $classes = classes::where('id', $request['class_id'])->first();
        $section = section::where('id', $request['section_id'])->first();
        $student->student_id = $data['first_name'] . $data['phone'];
        $student->class_name = $classes->class_name;
        $student->section_name = $section->section_name;
        $student->picture = $imagename;
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
    public function update(Request $request, students $student, $id)
    {
        
        // $data = $request->all();

        // $student = Students::where('id', $id)->first();
        // $student->update($data);

        // return response()->json([
        //     'status' => 200,
        //     'student'  => $student
        // ]);

        $request->validate([
            'file' => 'bail|mimes:jpg,png,jpeg',
        ]);

        $data = $request->all();

        $student = students::where('id', $id)->first();
        if(!empty($request['first_name']) && $request['first_name'] !== "undefined"){
            $student->first_name = $request['first_name'];
        }if(!empty($request['last_name']) && $request['last_name'] !== "undefined"){
            $student->last_name = $request['last_name'];
        }if(!empty($request['class_id']) && $request['class_id'] !== "undefined"){
            $classes = classes::where('id', $request['class_id'])->first();
            $student->class_name = $classes->class_name;
            $student->class_id = $request['class_id'];
        }if(!empty($request['section_id']) && $request['section_id'] !== "undefined"){
            $section = section::where('id', $request['section_id'])->first();
            $student->section_name = $section->section_name;
            $student->section_id = $request['section_id'];
        }if(!empty($request['email']) && $request['email'] !== "undefined"){
            $student->email = $request['email'];
        }if(!empty($request['phone']) && $request['phone'] !== "undefined"){
            $student->phone = $request['phone'];
        }if(!empty($request['file']) && !empty($request['picture'])){
            $imagename = $request['picture'].".".$request->file('file')->extension();
            $oldimage = $student->picture .".".$request->file('file')->extension();
            $fileName = storage_path()."/app/students/avatars/" . $imagename ;
            if(File::exists($fileName)){
                File::delete($fileName);
            }
            $image = $request->file('file')->storeAs('students/avatars', $imagename);
            if(File::exists($oldimage)){
                File::delete($oldimage);
            }
            $student->picture = $imagename;
        }
        $student->save();
        
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
        students::where('id', $id)->delete();

        return students::all();
    }
}
