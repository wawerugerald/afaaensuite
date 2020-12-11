<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCountry extends Model
{

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    
  ];

  protected $table = 'usercountries';

  //when i do not want to use created_at and Updated at as they are default to laravel
  public $timestamps = false;

//dont know if this will work...
  
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function heirachy()
  {
    return $this->hasMany(DataDump::class);
  }
  public function country()
  {
      return $this->hasOne(Country::class,'countryid','countryid');
  }
}