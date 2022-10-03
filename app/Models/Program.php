<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable=['programName','methods', 'exercises'];
    protected $casts=[
        'exercises'=>'array'
    ];

    public function userPrograms()
    {
        return $this->belongsToMany(User::class, 'plans', 'program_id', 'user_id');
    }
}
