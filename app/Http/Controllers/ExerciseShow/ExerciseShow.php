<?php

namespace App\Http\Controllers\ExerciseShow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercise;

class ExerciseShow extends Controller
{
    public function exerciseShow($id)
    {
        $exercise=Exercise::all()->where('id',$id)->first();
        return view('exerciseShow.index', compact('exercise'));
    }
}
