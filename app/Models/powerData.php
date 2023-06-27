<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class powerData extends Model
{
    use HasFactory;
    protected $table='pwr_datas';
    protected $fillable =['userId','fromDate','toDate','pwrConsTotal','dayQty','price','temperature','userInsert','userUpdate','dailyPwrConsum','year'];
}
