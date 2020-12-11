<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logactivity extends Model
{

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $table='logactivities';
  protected $fillable = [
    'subject','url','method',
  ];

  //when i do not want to use created_at and Updated at as they are default to laravel
  public $timestamps = false;

//dont know if this will work...
  
  public function user()
  {

    return $this->belongsTo(User::class);

  }
  public function contributor()
  {
    return $this->belongsTo(contributor::class);

  }
  public function datadump()
  {

    return $this->belongsTo(DataDump::class);
  }

}
