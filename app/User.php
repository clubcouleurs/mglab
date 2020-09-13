<?php

namespace App;

use App\Conception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Corcel\Model\User as Corcel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//use Corcel\Corcel as Corcel ;
//use Sofa\Eloquence\Eloquence; // base trait
//use Sofa\Eloquence\Mappable; // extension trait

class User extends Corcel
{
    use Notifiable;
    /*use Eloquence, Mappable;

        protected $table = 'wp_users';

        protected $maps = [
            // legacy db with badly named columns
            'email' => 'user_email',
            'password' => 'user_pass',
            'name' => 'user_nicename',
            'created_at' => 'user_registered'

        ];*/

        

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

    public function conceptionAConfigurer()
    {

        return Conception::where('user_id', $this->ID)
                                                ->whereNull('updated_at')
                                                ->orderBy('updated_at', 'desc')
                                                ->get();
       
    }

    public static function f()
    {
        # code...
    }

    public function conceptionACreer()
    {
        return Conception::where('user_id', $this->ID)
                                                ->whereNotNull('updated_at')
                                                ->orderBy('lancer_at', 'desc')
                                                ->get();

        
    }    

    public function isSuperAdmin()
    {
        if ($this->display_name ==='admin' && $this->user_login ==='admin' && $this->user_nicename ==='admin')
        {
            return true ;
        }
    }
}
