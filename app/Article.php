<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Article extends Model
{
    //Mass assigned
    protected $fillable=['title','slug','description_short','description','image','image_show','meta','meta_description','meta_keyword','published','created_by','modified_by'];


    //Polymorphic relations with categories
    public function categories(){
    return $this->morphToMany('App\Category','categoryable');}

    //Mutators
    public function setSlugAttribute($value){
        $this->attributes['slug']=Str::slug(mb_substr($this->title,0,40).".".\Carbon\Carbon::now()->format('dmyHi'),'-');

    }


    public function scopeLastArticles($query,$count)
    {
        return $query->orderBy('created_at','desc')->take($count)->get();
    }


}
