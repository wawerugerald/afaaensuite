<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComparisonAdmin extends Model
{
	protected $table='comparisonadmin1';
    protected $fillable = [
   'name','fullname','text',
  ];

  //when i do not want to use created_at and Updated at as they are default to laravel
  public $timestamps = false;

 public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function datadump()
  {
    return $this->hasMany(DataDump::class);
  }
  public function contributor()
  {
  	return $this->belongsTo(Contributor::class);
  }
  public function titles()
  {
    return $this->hasMany(Title::class, 'heirachyid','heirachyid');
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

}


 
    
   
    
    