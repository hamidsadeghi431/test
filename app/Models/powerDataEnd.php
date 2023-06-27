<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class powerDataEnd extends Model
{
    use HasFactory;
    protected $table='pwr_datas_end';
    protected $fillable =['id','userId','pwrConsTotal','dayQty','price','temperature','userInsert','userUpdate','dailyPwrConsum','year','month'];

}
