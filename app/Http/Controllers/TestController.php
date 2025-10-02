<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    // Get all courses
    public function index()
    {
        return response()->json(DB::table('courses')->get());
    }

    // Create a new course
    public function create()
    {
        $id = DB::table('courses')->insertGetId([
            'code' => 'CS101',
            'name' => 'Intro to Programming',
            'description' => 'Basic programming concepts',
            'credits' => 4,
            'semester' => 'Fall 2025',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response()->json(['id' => $id]);
    }

    // Get one course by id
    public function read($id)
    {
        $course = DB::table('courses')->find($id);
        return response()->json($course);
    }

    // Update a course by id
    public function update($id)
    {
        DB::table('courses')->where('id', $id)->update([
            'name' => 'Updated Course Name',
            'updated_at' => now(),
        ]);
        return response()->json(['message' => 'Course updated']);
    }

    // Delete a course by id
    public function delete($id)
    {
        DB::table('courses')->where('id', $id)->delete();
        return response()->json(['message' => 'Course deleted']);
    }
}
