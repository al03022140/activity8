<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\RoboticsKit;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role !== "Student"){
            abort(403, "You're not authorized to view this content.");
        }

        $courses = Course::with('roboticsKit')->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->role !== "Student"){
            abort(403, "You're not authorized to view this content.");
        }

        $roboticsKits = RoboticsKit::all();
        return view('courses.create', compact('roboticsKits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(auth()->user()->role !== "Student"){
            abort(403, "You're not authorized to view this content.");
        }

        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:courses,code',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'credits' => 'required|integer|min:1|max:255',
            'semester' => 'required|string|max:255',
            'robotics_kit_id' => 'nullable|exists:robotics_kits,id',
        ]);

        Course::create($validated);

        return redirect()->route('courses.index')->with('success', 'Curso creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::with('roboticsKit', 'users')->findOrFail($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(auth()->user()->role !== "Student"){
            abort(403, "You're not authorized to view this content.");
        }

        $course = Course::findOrFail($id);
        $roboticsKits = RoboticsKit::all();
        return view('courses.edit', compact('course', 'roboticsKits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(auth()->user()->role !== "Student"){
            abort(403, "You're not authorized to view this content.");
        }

        $course = Course::findOrFail($id);

        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:courses,code,' . $id,
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'credits' => 'required|integer|min:1|max:255',
            'semester' => 'required|string|max:255',
            'robotics_kit_id' => 'nullable|exists:robotics_kits,id',
        ]);

        $course->update($validated);

        return redirect()->route('courses.show', $course->id)->with('success', 'Curso actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(auth()->user()->role !== "Student"){
            abort(403, "You're not authorized to view this content.");
        }

        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Curso eliminado exitosamente');
    }
}
