<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fcTable extends Model
{
    use HasFactory;
    protected $fillable=['user_id','userInsert','userUpdate','fc','year','description'];
}
