<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Charts\StudentChart;


class StudentChartsController extends Controller
{
    public function index(Request $request)
    {
        $student = Student::all();

        $chart = new StudentChart;

        $chart->labels(['One', 'Two', 'Three', 'Four']);

        $chart->dataset('My dataset 1', 'line', [1, 2, 3, 4]);

        return view('inc.charts', compact('chart'));
    }
}
