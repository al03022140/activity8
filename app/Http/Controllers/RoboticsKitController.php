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
        $kits = RoboticsKit::all();
        return view('robotics.index', compact('kits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('robotics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        $kit = RoboticsKit::find($id);
        return view('robotics.edit', compact('kit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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
        $kit = RoboticsKit::find($id);
        $kit->delete();
        return redirect()->route('robotics.index');
    }
}
