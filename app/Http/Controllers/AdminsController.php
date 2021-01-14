<?php

namespace App\Http\Controllers;

use App\Admins;
use Illuminate\Http\Request;
use File;
use Storage;

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
        $request->validate([
            'file' => 'bail|required|mimes:jpg,png,Jpeg',
            'password' => 'min:6|required',
            'phone' => ['required', 'regex:/^((961[\s-]*(3|7(0|1)))|([\s+]961[\s-]*(3|7(0|1)))|(03|7(0|1)))[\s+-]*\d{6}$/u'],
            'email' => 'required|email|unique:admins'
        ]);

        $data = $request->all();
        $imagename = $request['picture'].".".$request->file('file')->extension();
        $image = $request->file('file')->storeAs('admins/avatars', $imagename);
        $admin = new Admins();
        $admin->fill($data);
        $admin->picture = $imagename;
        $admin->save();

        return response()->json([
            'status' => 200,
            'admin'  => $admin,

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
        $request->validate([
            'file' => 'bail|mimes:jpg,png,jpeg',
            'password' => 'min:6',
            'phone' => ['required', 'regex:/^((961[\s-]*(3|7(0|1)))|([\s+]961[\s-]*(3|7(0|1)))|(03|7(0|1)))[\s+-]*\d{6}$/u'],
         
        ]);

        $data = $request->all();
        
        $admin = Admins::where('id', $id)->first();
        if(!empty($request['password']) && $request['password'] !== "undefined"){
            $admin->password = $request['password'];
        }if(!empty($request['first_name']) && $request['first_name'] !== "undefined"){
            $admin->first_name = $request['first_name'];
        }if(!empty($request['last_name']) && $request['last_name'] !== "undefined"){
            $admin->last_name = $request['last_name'];
        }if(!empty($request['role']) && $request['role'] !== "undefined"){
            $admin->role = $request['role'];
        }if(!empty($request['email']) && $request['email'] !== "undefined"){
            $admin->email = $request['email'];
        }if(!empty($request['phone']) && $request['phone'] !== "undefined"){
            $admin->phone = $request['phone'];
        }if(!empty($request['file']) && !empty($request['picture'])){
            $imagename = $request['picture'].".".$request->file('file')->extension();
            $oldimage = $admin->picture .".".$request->file('file')->extension();
            $fileName = storage_path()."/app/admins/avatars/" . $imagename ;
            if(File::exists($fileName)){
                File::delete($fileName);
            }
            $image = $request->file('file')->storeAs('admins/avatars', $imagename);
            if(File::exists($oldimage)){
                File::delete($oldimage);
            }
            $admin->picture = $imagename;
        }
        $admin->save();
        
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

        return Admins::all();
    }
}