<?php

namespace App\Http\Controllers;

use App\classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $sections = classes::with('Getsections')->get();
        // // $students = classes::with('Getstudents')->get();
        // dd($sections);
         return Classes::all();
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
        $classes = new Classes();
        $classes->fill($data);
        $classes->save();

        return response()->json([
            'status' => 200,
            'classes'  => $classes
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(classes $classes, $id)
    {
        return classes::where('id', $id)->first();
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, classes $classes)
    {
        $data = $request->all();
        
        $classes = classes::where('id', $id)->first();
        $classes->update($data);

        return response()->json([
            'status' => 200,
            'student'  => $classes
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(classes $classes)
    {
        Classes::where('id', $id)->delete();
    }

    public function SectionStudent()
    {
         $sections = classes::with('Getsections')->get();
         $students = classes::with('Getstudents')->get();
         $allclasses = Classes::all();
         return response()->json([
            'status' => 200,
            // 'students'  => $students,
            // 'allclasses' => $allclasses,
            'sections' => $sections
        ]);
    }
}
