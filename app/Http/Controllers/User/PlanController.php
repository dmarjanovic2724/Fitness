<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Plan;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;

        $userName = User::find($userId)->name;

        $userPlan = User::find($userId)->program;

        return view('user.plan.index', compact('userName', 'userPlan'));
    }

    //program show


    public function show($id)
    {

        $userId = auth()->user()->id;
        $program = Program::all()->where('id', '=', $id)->first();
        $programName = $program->programName;
        $methods = $program->methods;
        $exerciseNum = $program->exercises;


        $exercise = [];


        foreach ($exerciseNum as $item) {

            $exercise[] = Exercise::all()->where('id', '=', $item);
        }


        $data = [];


        foreach ($exercise as $item) {
            foreach ($item as $exercise) {
                $data[] = $exercise;
            }
        }


        $program =collect($data);
        
        

        return view('user.plan.show', compact('program', 'userId', 'methods'));
    }

    public function programComplete(Request $request, $id)
    {

       if($request->input('complete') == "save")
       {
        $userId = auth()->user()->id;
       
        $plan = Plan::where('program_id', $id)->where('user_id', $userId)->update([
            'notes' => $request->feedback,
            'completed' => 1
        ]);
        $program = Program::where('id', $id)->first();
        $programName=$program->programName;
       
        
        return to_route('user.plan.index')->with('success', 'Congratulation, your working session '.$programName.' is done');
       }
        
    }
}
