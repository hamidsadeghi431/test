<?php

namespace App\Models\user;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roleAll extends Model
{
    use HasFactory;
    protected $table='roles';
    protected $primaryKey='role_id';
    public $timestamps =false;
    protected $fillable=['role_id','role_name'];
    public function usersRoleObj()
    {
        return $this->belongsTo(User::class,"role",'role_id');
    }
}
