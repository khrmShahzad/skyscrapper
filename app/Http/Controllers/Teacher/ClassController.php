<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Http\Requests\ClassRoomRequest;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {

        $classes = ClassRoom::orderBy('id','desc')->get();
        return view('teacher.class.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRoomRequest $request)
    {
       ClassRoom::create($request->all());
        return redirect()->route('classes.index')->with('success','Class successfully added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassRoom $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Class  $class
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $class)
    {
        return view('teacher.class.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassRoom $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(ClassRoomRequest $request, ClassRoom $class)
    {

        $class->update($request->all());

        return redirect()->route('classes.index')->with('success','Class successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoom $class
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRoom $class)
    {
        $class = ClassRoom::findOrFail($class->id);
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Class has been deleted Successfully');
    }
}
