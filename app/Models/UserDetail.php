<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'adress',
        'telephone',
        'image',
        'email',
        'status', 
        'user_id'       
    ];

   
}

