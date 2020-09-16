<?php

namespace App;

use App\Permission;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	public $timestamps = false;
	protected $fillable = ['name'] ;
	//protected $table = 'roles';
	protected $connection = 'mglab';

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }    

    public function allowTo($permission)
    {
    	if(is_string($permission))
    	{
    		$permission = Permission::whereName($permission)->firstOrFail() ;
    	}

    	$this->permissions()->syncWithoutDetaching($permission);
    }

}
