<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramStoreRequest;
use App\Models\Exercise;
use App\Models\Program;
use Illuminate\Http\Request;
use PDO;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program=Program::all();
        return view('admin.program.index', compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercises=Exercise::all();
        return view('admin.program.create', compact('exercises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
      // looking if program already exists
       $program=Program::where('programName',$request->input('name'))->first();
       
        $order=$request->input('order');
        $exer=$request->input('selected');
        $num=[];
        $i=0;
        $exercises=[];
    
    foreach($order as $key => $value)
    {
        if($value != null)
        {
            $num[]=$value;
        }
    }
    foreach($exer as $key => $value)
    {
       
            $exercises[]=$value;
       
    }
     if(count($num) != count($exercises))
     {
        
        return back()->withInput()->with('danger', 'you have to enter number of exercise');
     }
$results=array_combine($num,$exercises);
ksort($results);
$selected=[];
foreach($results as $key => $value){
 $selected[]=$value;
}

       if($program)
       {
        return back()->with('danger', 'Exercise program name allredy exist.');
        //if we want to save exercise with the same program name uncoment next two line of come and coment before line
        // $program->exercises=$request->input('selected');
        // $program->save();
       }else{
        
        Program::create([
            'programName'=>$request->input('name'),
            'methods'=>$request->input('method'),
            'exercises'=>$selected           
        ]);
    
       }
        
        return to_route('admin.program.index')->with('success', 'Exercise created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {

       
            $exerciseNum=[];
            foreach($program->exercises as $item)
            {
                $exerciseNum[]=Exercise::all()->where('id', '=', $item);
            }  
            
            $program=[];
            foreach($exerciseNum as $item)
            {
                foreach($item as $exer)
                {
                    $program[]=$exer;
                }
                
            }           
      $data=collect($program);
    
        return view('admin.program.show',compact('data'));
    }

    
    public function edit(Program $program)
    {

        $programName=$program->programName;
        $programMethod=$program->methods;
          
        $exerciseNum=[];
        foreach($program->exercises as $item)
        {
            $exerciseNum[]=Exercise::all()->where('id', '=', $item);
        }  
        
        $program=[];
        foreach($exerciseNum as $item)
        {
            foreach($item as $exer)
            {
                $program[]=$exer;
            }
            
        } 
            
        
        
        
        return view('admin.program.edit',compact('program', 'programName', 'programMethod'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
      $program->delete();
      return to_route('admin.program.index')->with('danger','Program deleted successfully');
    }
}
