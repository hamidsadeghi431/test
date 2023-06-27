<?php

namespace App\Models\menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menugrade3 extends Model
{
    use HasFactory;
    protected $table='menugrade3';
    protected $fillable =['id','idg2','orderBy','NameG3','link'];

    public function mastermg2()
    {
        return $this->belongsTo(menugrade2::class,'foreign_key');
    }
}
