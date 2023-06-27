<?php

namespace App\Models\menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menugrade1 extends Model
{
    use HasFactory;
    protected $table='menugrade1';
    protected $fillable =['id','orderBy','NameG1','link'];

    public function slavemg2()
    {
        //چون این جدول به جدول منوی درجه 2 وصل ست و فارن کی ندارد از هزوان استفاده میکنیم
        return $this->hasOne(menugrade2::class,'foreign_key');
    }

}
