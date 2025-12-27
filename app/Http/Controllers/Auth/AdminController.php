<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function store(AdminLoginRequest $request)
    {

        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(route('dashboard.user'));

        return redirect()->intended(route('dashboard.admin'));

        // if( $request->authenticate()){

        //     $request->session()->regenerate();

        //     return redirect()->intended(route('dashboard.user'));
        // }

        // return redirect()->back()->withErrors(['name'=>'يوجد خطا في كلمة الايميل او كلمة المرور']);


        //         try {
        //     $request->authenticate();
        //     $request->session()->regenerate();
        //     return redirect()->intended(route('dashboard.admin'));
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     return redirect()->back()
        //         ->withErrors(['email' => 'يوجد خطأ في البريد الإلكتروني أو كلمة المرور'])
        //         ->withInput($request->only('email'));
        // }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
