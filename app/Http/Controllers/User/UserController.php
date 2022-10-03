<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function profileInfo()
    {
        
    }

    public function edit()
    {   
        $userId = auth()->user()->id;
        $user = User::find($userId);
        // dd($user);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $image=$user->getDetail->image;      
       
        if($request->hasFile('image')){
            if($image == true)
            {
                Storage::delete($image);
            }            
            $image=$request->file('image')->store('public/userImage');        }
    
        $user->update([
            'name'=>$request->name,                       
        ]);
        $user->getDetail->update(
            [
                'adress'=>$request->adress,            
                'telephone'=>$request->telephone,
                'image'=>$image,
            ]
            );
        return to_route('user.index')->with('success', 'Your profile information is  successfully updated.');  
    }
}
