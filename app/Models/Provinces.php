<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{

    use HasFactory;
    protected $table='province_cities';
    protected $fillable=['id','user_id','parent','title','sort','coeficent','region','latitude','longitude','active'];
}
