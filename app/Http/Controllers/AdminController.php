<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterValidation;
use App\Http\Requests\LoginValidation;
use App\Product\ProductDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{   

    // public function __construct()
    // {
    //     $this->middleware('guest:admin')->except('logout','ShowProfile');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowRegister()
    {
        return view('custom.register');
    }

    public function ShowLogin()
    {
        return view('custom.login');
    }
    public function ShowProfile(Request $request)
    {   
       
       
        $user=Auth::guard('admin')->user();
        return view('custom.profile',compact('user'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Register(RegisterValidation $request)
    {


        Admin::create([
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Login(LoginValidation $request)
    {

        $product1=new ProductDetail;
        dd($product1);
        // if (Auth::guard('admin')->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ])) {
        //     $request->session()->regenerate();
            
        //     return redirect()->intended('profile');
        // } else {
        //     return 'sorry';
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function Logout(Request $request)
    {   
        
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect('/admin/login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
}


