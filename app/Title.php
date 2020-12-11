<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table='title';
    protected $fillable = [
        'titlename','titletext','heirachyid',
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
    public function comparisonadmins()
    {
        return $this->belongsTo(ComparisonAdmin::class);
    }
    public function Countries()
    {
    	return $this->belongsTo(UserCountry::class);
    }
     public function datadump()
    {
        return $this->belongsTo(DataDump::class);
    }
    public function chapters()
    {
      return $this->hasMany(Chapter::class);
    }
     public function parts()
    {
        return $this->hasMany(Part::class);
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    public function subsections()
    {
        return $this->hasMany(Subsection::class);
    }
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
