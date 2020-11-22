<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    //To protect entered data
    protected $fillable = ['title','image','description','user_id'];

    // To Upload Image
    protected $appends = ['image_path'];

    /**
     * get Image Path For any images
     *
     * @return void
     */
    public function getImagePathAttribute()
    {
        return asset('uploads/service/' . $this->image);
    }


    //Relation between Users and Services ( One-to-Many )
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //Relation between Services and Lessons ( One-to-Many )
    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

}
