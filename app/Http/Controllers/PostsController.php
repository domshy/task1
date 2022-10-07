<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use PDF;
use App\Exports\StudentExport;
use Excel;



class PostsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->orderBy('fullname', 'desc')->get();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'fullname' => 'required|string|min:3',
            'birth_place' => 'required',
            'gender' => 'required',
            'dob' => 'date_format:Y-m-d|before:today|nullable',
            'contact' => 'required|max:11',
            'email' => 'required',
            'address' => 'required'
        ]);

        $post = new Post;
        $post->fullname = $request->input('fullname');
        $post->birth_place = $request->input('birth_place');
        $post->gender = $request->input('gender');
        $post->dob = $request->input('dob');
        $post->contact = $request->input('contact');
        $post->email = $request->input('email');
        $post->address = $request->input('address');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', 'User Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.students')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
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
            'fullname' => 'required|string|min:3',
            'birth_place' => 'required',
            'gender' => 'required',
            'dob' => 'date_format:Y-m-d|before:today|nullable',
            'contact' => 'required|max:11',
            'email' => 'required',
            'address' => 'required'
        ]);

        $post = Post::find($id);
        $post->fullname = $request->input('fullname');
        $post->birth_place = $request->input('birth_place');
        $post->gender = $request->input('gender');
        $post->dob = $request->input('dob');
        $post->contact = $request->input('contact');
        $post->email = $request->input('email');
        $post->address = $request->input('address');
        $post->save();

        return redirect('/posts')->with('success', 'User Details Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'User Deleted!');
    }

    public function getAllStudent()
    {
        $post = Post::all();
        return view('posts.show')->with('posts', $post);
    }

    public function downloadPDF()
    {
        $post = Post::all();
        $pdf = PDF::loadView('posts.show', array('posts' => $post))->setPaper('a4', 'portrait');
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
    
    public function importForm(){
        return view('import-form');
    }
}
