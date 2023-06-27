<?php

namespace App\Models\menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class menugrade2 extends Model
{
    use HasFactory;
    protected $table='menugrade2';
    protected $fillable =['id','idg1','orderby','NameG2','link'];

    public function mastermg1()
    {
        //چون در این جدول فارن کی جدول منوی درجه یک قرار دارد بنابراین از بیلانگز توو استفاده می کنیم.
        return $this->belongsTo(menugrade1::class,'foreign_key');
    }

    public function slavemg3()
    {
        return $this->hasOne(menugrade3::class,'foreign_key');
    }
}
