<?php

namespace App;

use App\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	public $timestamps = false;
	protected $fillable = ['name'] ;
	//protected $table = 'wp_permissions';
	protected $connection = 'mglab';



    public function roles()
    {
    	return $this->belongsToMany(Role::class);
    }

    
}
