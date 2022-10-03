<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseStoreRequest;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises=Exercise::all();
        return view('admin.exercise.index', compact('exercises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exercise.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExerciseStoreRequest $request)
    {
        $image = $request->file('image')->store('public/exercise');
        Exercise::create([
            'name'=>$request->name,
            'type'=>$request->type,
            'level_1'=>$request->level_1,
            'level_2'=>$request->level_2,
            'level_3'=>$request->level_3,
            'image'=>$image,
            'description'=>$request->description,
        ]);
        return to_route('admin.exercise.index')->with('success', 'Exercise created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        
        return view('admin.exercise.edit', compact('exercise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise)
    {

        $request->validate([
            'name'=>'required',            
            'level_1'=>'required',
            'level_2'=>'required',
            'level_3'=>'required',            
            'description'=>'required'
        ]);
        $image=$exercise->image;
        if($request->hasFile('image')){
            Storage::delete($exercise->image);
            $image=$request->file('image')->store('public/exercise');
        }
    
        $exercise->update([
            'name'=>$request->name,
            'type'=>$request->type,
            'level_1'=>$request->level_1,
            'level_2'=>$request->level_2,
            'level_3'=>$request->level_3,
            'image'=>$image,
            'description'=>$request->description,
        ]);
        return to_route('admin.exercise.index')->with('success', 'Exercise created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        Storage::delete($exercise->image);
        $exercise->delete();
        return to_route('admin.exercise.index')->with('danger','Category deleted successfully');
    }
}
