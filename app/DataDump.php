<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataDump extends Model
{
    protected $table='docheirachy';
    protected $fillable = [
        'doctype','enactdate','doctitletext','doctitle','primaryusedefault',
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
    public function reviewerpublisher()
    {
        return $this->belongsTo(Reviewerpublisher::class);
    }
    public function comparisonadmins()
    {
        return $this->belongsTo(ComparisonAdmin::class);
    }

    public function Countries()
    {
    	return $this->belongsTo(UserCountry::class);
    }
    public function chapter()
    {
        return $this->hasMany(Chapter::class);
    }
    public function part()
    {
        return $this->hasMany(Part::class);
    }
    public function section()
    {
        return $this->hasMany(Section::class);
    }
    public function subsection()
    {
        return $this->hasMany(Subsection::class);
    }
    public function article()
    {
        return $this->hasMany(Article::class);
    }
    public function titles()
    {
        return $this->hasMany(Title::class, 'heirachyid','heirachyid');
    }
    public function logactivities()
    {
        return $this->hasMany(Logactivity::class);
    }
    public function getContryDocuments($country)
    {
        $docs = DataDump::orderBy('countryid','desc')->where('countryid',$country)->limit(50)->get();
        return $docs;
    }
}
