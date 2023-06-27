<?php

namespace App\Models\user;

use App\Models\user\roleAx;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class access_element extends Model
{
    use HasFactory;
    protected $table='access_element';
    protected $fillable=['ax_id','access_tree','cat','access_Description','route_address'];
    public function ConnectToRoleAx()
    {
        return $this->belongsTo(roleAx::class,'role_access','ax_id');
    }
}
