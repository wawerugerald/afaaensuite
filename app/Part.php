<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table='part';
    protected $fillable = [
        'partname','parttext',
    ];
    public $timestamps = false;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function Contributor()
    {
    	return $this->belongsTo(Contributor::class);
    }

    public function Countries()
    {
    	return $this->belongsTo(UserCountry::class);
    }
     public function datadump()
    {
        return $this->belongsTo(DataDump::class);
    }
    public function titles()
    {
        return $this->belongsTo(Title::class);
    }
    public function chapters()
    {

        return $this->belongsTo(Chapter::class);
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    public function subsections()
    {
        return $this->hasMany(subsection::class);
    }
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

}
