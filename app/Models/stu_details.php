<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stu_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'NIC',
   
    
    ];
}
