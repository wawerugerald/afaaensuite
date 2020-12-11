<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'roles','email', 'password',
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
    //to check if this will work     
    public function countries()
    {
      return $this->hasMany(UserCountry::class);
    }
    public function comparisonadmins()
    {
        return $this->hasMany(ComparisonAdmin::class);
    }
    public function contributor()
    {
      return $this->hasMany(Contributor::class);    
    }
    public function heirachy()
    {        
        return $this->hasMany(DataDump::class);
    }
    public function logactivities()
    {
        return $this->hasMany(Logactivity::class);
    }
    public function reviewerpublisher()
    {
        return $this->hasMany(Reviewerpublisher::class);
    }
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
