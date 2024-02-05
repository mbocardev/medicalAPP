<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // redirect to dashboard if user is admin or doctor
        if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'doctor') {
            return redirect()->to('/dashboard');
        };

        $depar= Department::count();
        $departments = Department::all();
        $doctors = User::whereHas('role', function ($query) {
            $query->where('name', 'doctor');
        })->get();

        return view('home',
        ['dep'=>$depar ,'doctors' => $doctors], compact('departments'));
    }
}
