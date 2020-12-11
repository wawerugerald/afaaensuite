<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $fillable = [
    'organisationname','organisationadd','organisationno','organisationweb',
  ];

  //when i do not want to use created_at and Updated at as they are default to laravel
  public $timestamps = false;

  public function contributor()
  {

    return $this->belongsTo(Contributor::class);

  }
  public function reviewerpublisher()
  {
  	return $this->belongsTo(Reviewerpublisher::class);
  }
}
