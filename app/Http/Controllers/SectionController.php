<?php

namespace App\Http\Controllers;

use App\section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return Section::all();
         $section = section::with('Getattendance')->get();
        // dd($section);
        return response()->json([
            'status' => 200,
            'section'  => $section
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $class_id)
    {
        $request->validate([
            'section_name' => 'required|max:1',
        ]);

        $data = $request->all();
        $section = new Section();
        $section->fill($data);
        $section->save();
        $sections = section::where('class_id', $class_id)->get();
        return response()->json([
            'status' => 200,
            'section'  => $sections
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(section $section, $id)
    {
        return section::where('id', $id)->first();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, section $section)
    {
        $request->validate([
            'section_name' => 'required|max:1',
        ]);
        
        $data = $request->all();
        
        $section = section::where('id', $id)->first();
        $section->update($data);
        
        return response()->json([
            'status' => 200,
            'sections'  => $section
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(section $section,$id)
    {   
        $students = section::find($id)->Getstudents()->get();
        if(count($students) < 1){
                section::where('id', $id)->delete();
                return response()->json([
                    'status' => 200,
                    'message'  => "section deleted",
                ]);
        }
        else {
        return response()->json([
            'status' => 200,
            'message'  => "Cannot delete while section has students" ,
        ]);
      }
  }    
}
