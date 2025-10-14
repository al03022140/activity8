<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoboticsKit;

class RoboticsKitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role !== "Student"){
            abort(403, "You're not authorized to view this content.");
        }

        $kits = RoboticsKit::all();
        return view('robotics.index', compact('kits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->role !== "Student"){
            abort(403, "You're not authorized to view this content.");
        }

        return view('robotics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(auth()->user()->role !== "Student"){
            abort(403, "You're not authorized to view this content.");
        }

        RoboticsKit::create([
            'name' => $request->name,
        ]);

        return redirect()->route('robotics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kit = RoboticsKit::with('courses')->find($id);
        return view('robotics.show', compact('kit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(auth()->user()->role !== "Student"){
            abort(403, "You're not authorized to view this content.");
        }

        $kit = RoboticsKit::find($id);
        return view('robotics.edit', compact('kit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(auth()->user()->role !== "Student"){
            abort(403, "You're not authorized to view this content.");
        }

        $kit = RoboticsKit::find($id);

        $kit->update([
            'name' => $request->name
        ]);

        return redirect()->route('robotics.show', $kit->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(auth()->user()->role !== "Student"){
            abort(403, "You're not authorized to view this content.");
        }

        $kit = RoboticsKit::find($id);
        $kit->delete();
        return redirect()->route('robotics.index');
    }
}
