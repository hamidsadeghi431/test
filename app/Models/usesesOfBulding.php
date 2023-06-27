<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usesesOfBulding extends Model
{
    use HasFactory;
    protected $table='usesesofbulding';
    protected $fillable=['title','parents','userInsert','userUpdate','orderby','active'];
}
