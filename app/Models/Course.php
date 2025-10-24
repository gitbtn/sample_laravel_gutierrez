<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
   // use HasFactory, softDeletes;
    use HasFactory;
    protected $fillable = ['id','course_code','course_desc','photo'];
}
