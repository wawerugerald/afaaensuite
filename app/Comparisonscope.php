<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comparisonscope extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table='comparisonscope';
  
    protected $fillable = [
    'scopename','description',
  ];

  //when i do not want to use created_at and Updated at as they are default to laravel
  public $timestamps = false;
}
