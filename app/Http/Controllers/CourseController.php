<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Comment;
use App\Models\Course;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        // $courses =Course::latest('id')->paginate(perPage: 5);
        if($request->has('search')){
        $courses = Course::withCount('lessons')->where('title', 'like', '%' . $request->search . '%')
        ->orderBy($request->sort , $request->order)
        ->paginate(5);

        }else{
        $courses = Course::withCount('lessons')->orderBy('id', 'asc')->paginate(5);
        }

        return view('courses.index', compact('courses'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $path=$request->file('image')
        ->store('uploads','custom');

        // dd($path);
    Course::create([
        'title'=>$request->title,
        'image'=>$path,
        'hours'=>$request->hour,
        'price'=>$request->price,
        'content'=>$request->input('content'),
    ]);

        return redirect()->route('courses.index')
        ->with('msg','Course created successfully')
         ->with('type','success')
        ;
    }

    /**
     * Display the specified resource.
     */
    // public function show( $id)
    // {
    //     $course = Course::findOrFail($id);
    //     return view('courses.show', compact('course'));
    // }
    public function show(Course $course)
    {
        $course->loadCount('comments');
        $course->load(['comments.replies','comments.user','tags']);
            return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {
        if($request->hasFile('image')){
  $path=$request->file('image')
        ->store('uploads','custom');

        }

        // dd($path);
    $course->update([
        'title'=>$request->title,
        'image'=>$path ?? $course->image,
        'hours'=>$request->hour,
        'price'=>$request->price,
        'content'=>$request->input('content'),
    ]);

        return redirect()->route('courses.index')
        ->with('msg','Course updated successfully')
         ->with('type','warning')
        ;
    }


    // public function destroy($id)
    // {
    //     $course = Course::findOrFail($id);
    //     $course->delete();

    //     return redirect()->route('courses.index')
    //     ->with('msg','Course deleted successfully')
    //     ->with('type','danger');
    // }
    public function destroy(Course $course)
    {
        // File::delete($course->image);
        $course->delete();
        return redirect()->route('courses.index')
            ->with('msg', 'Course deleted successfully')
            ->with('type', 'danger');
    }
        public function search(Request $request)
    {
        return [
            'courses' => Course::where('title', 'like', '%' . $request->search . '%')
            ->take(5)->get()
        ];


    }
      /**
     * Show the trash resource.
     */
    public function trash(){
        $courses = Course::onlyTrashed()
        ->paginate();
        return view('courses.trash', compact('courses'));
    }
    public function restore(Course $course)  {
        $course->restore();
        return redirect()->route('courses.trash')
            ->with('msg', 'Course restore successfully')
            ->with('type', 'info');

    }
    public function delete(Course $course){
             File::delete($course->image);
            $course->forceDelete();
              return redirect()->route('courses.trash')
            ->with('msg', 'Course deleted permanently successfully')
            ->with('type', 'danger');
    }
    public function comments(Request $request){
        Comment::create([
            'course_id'=>$request->course_id,
            'user_id'=>$request->user_id,
            'comment'=>$request->comment,
            'reply_to'=>$request->reply_to,
        ]);
        return redirect()->back();
    }
}