<?php

namespace App\Models\user;

use App\Models\user\access_element;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roleAx extends Model
{
    use HasFactory;
    protected $table='role_access';
    public $timestamps = false;
    protected $fillable=['id','role_id','role_access','role_access_page','input_code'];
    public function GiveRouteFromRoleAx()
    {
        return $this->hasOne(access_element::class,'ax_id','role_access');
    }
}
