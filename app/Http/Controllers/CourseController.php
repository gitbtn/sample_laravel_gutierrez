<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //QUERY BUILDER
        //$data = DB::table('courses')->get();

        //ELOQUENT
        $data = Course::all();

        //FIND
        //$data = Course::find(1);

        //WHERE
        //$data = Course::where('status','active')->get();

        //FindorFail
        //$data = Course::findOrFail(1);

        //Combination


        return view('courses/view',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_code' => ['required','string','max:255'],
            'course_desc' => ['required','string'],
            'photo' => ['nullable', 'image'],
        ]);

        if($request->hasFile('photo'))
        {
            $validated['photo'] = $request->file('photo')->store('courses','public');
        }

        Course::create($validated);
        /*
        $data=[
            'course_code' => $request->input('course_code'),
            'course_desc' => $request->input('course_desc'),
            'created_at' =>now(),
            'updated_at' =>now(),
        ];

        $create = DB::table('courses')->insert([$data]);
*/
        return redirect('/courses/');

        //return redirect('/courses/')->with("Bluetooth device is successfully connected");
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $course)
    {
        $data = DB::table('courses')->where('id',$course)->get()->first();

        return view('courses/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {

        $validated = $request->validate([
            'course_code' => ['required','string','max:255'],
            'course_desc' => ['required','string'],
            'photo' => ['nullable', 'image'],
        ]);

        if($request->hasFile('photo'))
        {
            if($course->photo)
            {
                Storage::disk('public')->delete($course->photo);
            }
            $validated['photo'] = $request->file('photo')->store('courses','public');
        }

  //      Course::where('id',$course->id)->update($validated);

        $course->update($validated);

return redirect('/courses/');
        /*
        $data=[
            'course_code' => $request->input('course_code'),
            'course_desc' => $request->input('course_desc'),
            'created_at' =>now(),
            'updated_at' =>now(),
        ];

        $update = DB::table('courses')->where('id',$course)->update($data);

        return redirect('/courses/');
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $course)
    {
        $delete = DB::table('courses')->where('id',$course)->delete();
        return redirect('/courses/');
    }

    public function delete(Course $course)
    {
        /*
        $delete = DB::table('courses')->where('id',$course)->delete();
        return redirect('/courses/');
        */

        if($course->photo)
            {
                Storage::disk('public')->delete($course->photo);
            }

        $course->delete();

        return redirect('/courses/');
    }
}
