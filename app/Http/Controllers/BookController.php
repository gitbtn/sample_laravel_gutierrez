<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //QUERY BUILDER
        //$data = DB::table('Books')->get();

        //ELOQUENT
        $data = Book::all();

        //FIND
        //$data = Course::find(1);

        //WHERE
        //$data = Course::where('status','active')->get();

        //FindorFail
        //$data = Course::findOrFail(1);

        //Combination


        return view('books/view',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=[
            'course_code' => $request->input('course_code'),
            'course_desc' => $request->input('course_desc'),
            'created_at' =>now(),
            'updated_at' =>now(),
        ];

        $create = DB::table('books')->insert([$data]);

        return redirect('/books/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $course)
    {
        $data = DB::table('books')->where('id',$course)->get()->first();

        return view('books/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $course)
    {
        $data=[
            'course_code' => $request->input('course_code'),
            'course_desc' => $request->input('course_desc'),
            'created_at' =>now(),
            'updated_at' =>now(),
        ];

        $update = DB::table('books')->where('id',$course)->update($data);

        return redirect('/books/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $course)
    {
        $delete = DB::table('books')->where('id',$course)->delete();
        return redirect('/books/');
    }

    public function delete(string $course)
    {
        $delete = DB::table('books')->where('id',$course)->delete();
        return redirect('/books/');
    }
}
