<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TehranAvTemperature extends Model
{
    use HasFactory;
    protected $fillable =['cityCode','provinceCode','date','avtemp','userInsert','userUpdate'];
}
