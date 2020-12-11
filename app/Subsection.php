<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsection extends Model
{
    protected $table='subsection';
    protected $fillable = [
        'subsectionname','subsectiontext',
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
    public function titles()
    {
        return $this->belongsTo(Title::class);        
    }
    public function chapters()
    {
        return $this->belongsTo(Chapter::class);        
    }
    public function parts()
    {
        return $this->belongsTo(Part::class);
    }
    public function sections()
    {
        return $this->belongsTo(Section::class);
    }
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
