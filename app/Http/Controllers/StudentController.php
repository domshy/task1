<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use PDF;
use App\Exports\StudentExport;
use App\Helpers\Helper;
use App\Imports\StudentImport;
use Excel;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::where('user_id', auth()->user()->id)->orderBy('fullname', 'asc')->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'role' => 'student',
            'fullname' => ['required', 'string', 'min:3', 'max:255'],
            'birth_place' => ['required', 'string'],
            'gender' => 'required',
            'dob' => 'date_format:Y-m-d|before:today|nullable',
            'contact' => 'required|integer',
            'email' => ['required', 'regex:/.+@(gmail|yahoo)\.com$/', 'unique:users'],
            // 'password' => ['required', 'min:8', 'confirmed'],
            'address' => ['required', 'max:255', 'min:10']
        ]);

        $student_no = Helper::IDGenerator(new Student,  'student_no', 7, 'STDNT');

        $student = new Student;
        $student->role = "student";
        $student->fullname = $request->input('fullname');
        $student->birth_place = $request->input('birth_place');
        $student->gender = $request->input('gender');
        $student->dob = $request->input('dob');
        $student->contact = $request->input('contact');
        $student->email = $request->input('email');
        // $student->password = Hash::make($request['password']);
        $student->address = $request->input('address');
        $student->user_id = auth()->user()->id;
        $student->student_no = $student_no;
        $student->save();

        return redirect('/students')->with('success', 'User Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.students')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fullname' => ['required', 'string', 'min:3', 'max:255'],
            'birth_place' => ['required', 'string'],
            'gender' => ['required'],
            'dob' => ['date_format:Y-m-d', 'before:today', 'nullable'],
            'contact' => ['required', 'regex:/^(09)\\d{9}$/'],
            'email' => ['required', 'regex:/(.+)@(.+)\.(.+)/i'],
            // 'password' => ['required', 'min:8', 'confirmed'],
            'address' => ['required', 'max:255']
        ]);

        $student = Student::find($id);
        $student->role = "student";
        $student->fullname = $request->input('fullname');
        $student->birth_place = $request->input('birth_place');
        $student->gender = $request->input('gender');
        $student->dob = $request->input('dob');
        $student->contact = $request->input('contact');
        $student->email = $request->input('email');
        // $student->password = Hash::make($request['password']);
        $student->address = $request->input('address');
        $student->save();

        return redirect('/students')->with('success', 'User Details Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/students')->with('success', 'User Deleted!');
    }

    public function getAllStudent()
    {
        $student = Student::all();
        return view('students.show')->with('students', $student);
    }

    public function downloadPDF()
    {
        $student = Student::all();
        $pdf = PDF::loadView('students.show', array('students' => $student))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function exportToExcel()
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }

    public function exportIntoCSV()
    {
        return Excel::download(new StudentExport, 'students.csv');
    }

    public function importForm()
    {
        return view('import-form')->with('posts');
    }

    public function import(Request $request)
    {
        Excel::import(new StudentImport, $request->file);
        $student = Student::all();
        return view('students.index')->with('students', $student);
    }
}
