<?php

namespace App\Http\Controllers;

use App\User;
use App\Student;

use Illuminate\Http\Request;

class DashboardController extends Controller
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
        $data = array();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $total = Student::all()->count();

        $data = [
            'students' => $user->students,
            'total' => $total
        ];
        // dd($total);
        return view('dashboard', $data);
    }

    public function show()
    {
    }
}
