<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{

 protected $table='users';
  protected $fillable = [
        'language','gender','biography','profileimage',
    ];

    public $timestamps = false;
    public function getImageAttribute()
    {
        return $this->profileimage;
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function organisation()
    {
      return $this->hasMany(Organisation::class);
    }
     public function acts()
    {
      return $this->hasMany(Acts::class);
    }
    public function heirachy()
    {
      return $this->hasMany(DataDump::class);
    }
    public function logactivities()
    {
      return $this->hasMany(Logactivity::class);
    }
    public function comparisonadmins()
    {
      return $this->hasMany(ComparisonAdmin::class);
    }
    public function comment()
    {
      return $this->hasMany(Comments::class);
    }
    public function institutions()
    {
      return $this->hasMany(Institution::class);
    }
}
