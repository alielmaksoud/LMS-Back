<?php

namespace App\Http\Controllers;

use App\Admins;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Admins::all();
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
        $admin = new Admins();
        $admin->fill($data);
        $admin->save();

        return response()->json([
            'status' => 200,
            'admin'  => $admin
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Admins::where('id', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $admin = Admins::where('id', $id)->first();
        $admin->update($data);

        return response()->json([
            'status' => 200,
            'admin'  => $admin
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admins::where('id', $id)->delete();
    }
}