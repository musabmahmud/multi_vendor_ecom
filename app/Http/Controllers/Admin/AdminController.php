<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.dashboard')->with(compact('adminDetails'));
    }
    public function login(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = $request->validate([
                'email' => 'required|max:255',
                'password' => 'required|max:255|min:8',
            ]);


            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) {
                return redirect('admin/dashboard');
            } else {
                return redirect()->back()->with('error_message', 'Invalid Email or Password');
            }
        }

        return view('admin.login');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function passwordUpdate(Request $request)
    {
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_password')->with(compact('adminDetails'));
    }

    public function checkAdminPassword(Request $request){
        $data = $request->validate([
            'current_password' => 'required|max:255|min:8',
        ]);
        if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
            return "true";
        }
        else{
            return "false";
        }
    }
}
