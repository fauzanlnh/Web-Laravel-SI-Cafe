<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function checkLogin(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required|string'
        ];

        $messages = [
            'username.required' => 'username wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.string' => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            // Auth Passed
            $userRole = Auth::user()->role;

            switch ($userRole) {
                case 'admin':
                    return redirect('admin');
                case 'petugas':
                    return redirect('petugas');
                case 'koki':
                    return redirect('koki');
                default:
                    Session::flash('error', 'Role tidak valid');
                    return redirect('login');
            }
        } else {
            // Auth failed
            Session::flash('error', 'username atau password salah');
            return redirect('login');
        }
    }
}
