<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'institutionname','institutionadd','institutionpost','institutionno','institutionweb',
  ];

  //when i do not want to use created_at and Updated at as they are default to laravel
  public $timestamps = false;

  public function contributors()
  {
   return $this->belongsTo(Contributor::class);
  }
  public function country()
  {
    return $this->belongsTo(Country::class);
  }

}
