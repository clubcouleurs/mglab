<?php

namespace App;

use App\Conception;
use App\Graphiste;
use App\Notification;
use App\Role;
use Corcel\Model\User as Corcel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//use Corcel\Corcel as Corcel ;
//use Sofa\Eloquence\Eloquence; // base trait
//use Sofa\Eloquence\Mappable; // extension trait

class User extends Corcel
{
    use Notifiable;
      

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function conceptions()
    {
        return $this->hasMany(Conception::class)->latest();
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'notifiable_id')->latest();
    }

    public function propals()
    {
        return $this->hasMany(Propal::class)->latest();
    }    

    public function conceptionAConfigurer()
    {
      
        return Conception::where('user_id', $this->ID)
                                                ->whereNull('updated_at')
                                                ->orderBy('updated_at', 'desc')
                                                ->get();
       
    }


    public function conceptionACreer()
    {
        return Conception::where('user_id', $this->ID)
                                                ->whereNotNull('lancer_at')
                                                ->orderBy('lancer_at', 'desc')
                                                ->get();

        
    }    

    public function graphiste()
    {
        return $this->hasMany(Graphiste::class)->latest();
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user' , 'user_id' , 'role_id');
    }

    public function assignRole(Role $role)
    {
        $this->roles()->syncWithoutDetaching($role) ;
    }

    public function permissions()
    {
        return $this->roles->map->permissions->flatten()->pluck('name')->unique(); ;
    }    

    public function isSuperAdmin()
    {
        if ($this->display_name ==='admin' && $this->user_login ==='admin' && $this->user_nicename ==='admin')
        {
            return true ;
        }
    }
}
