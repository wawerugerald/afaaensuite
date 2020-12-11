<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviewerpublisher extends Model
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
	public function datadumps()
	{
		return $this->hasMany(DataDump::class);
	}
}