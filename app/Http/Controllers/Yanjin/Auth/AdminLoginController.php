<?php

namespace App\Http\Controllers\Yanjin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm(){
        return view('yanjin.layouts.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request){
        //validate
        try {
            $this->validate($request, [
                'name' => 'required',
                'password' => 'required',
            ]);
        } catch (ValidationException $e) {
            return "error";
        }
        //attempt to login
        if (Auth::guard('admin')->attempt(['name'=> $request->name, 'password'=> $request->password], $request->remember)){
            //if success
            return redirect()->intended(route('arsip.form'));
        }
        //if unseuccess
        return redirect()->back()->withInput($request->only('name', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/arsip');
    }
}
