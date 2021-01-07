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
        return Section::all();
        // $section = section::with('Getstudents')->get();
        // dd($section);
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
        $section = new Section();
        $section->fill($data);
        $section->save();

        return response()->json([
            'status' => 200,
            'section'  => $section
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
        $data = $request->all();
        
        $section = section::where('id', $id)->first();
        $section->update($data);

        return response()->json([
            'status' => 200,
            'student'  => $section
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(section $section)
    {
        Section::where('id', $id)->delete();
    }
}
