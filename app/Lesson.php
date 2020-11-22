<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lesson extends Model
{
    //To protect entered data
    protected $fillable = ['service_id','title','subtitle','video_link',
                            'description','image','user_id'];

    
    // To Upload Image
    protected $appends = ['image_path'];

    /**
     * get Image Path For any images
     *
     * @return void
     */
    public function getImagePathAttribute()
    {
        return asset('uploads/lesson/' . $this->image);
    }

    
    //Get youtube ID
    public function getYoutubeIdAttribute()
    {
        $pattern = '#^(?:https?://)?(?:www.)?(?:youtu.be/|youtube.com(?:/embed/|/v/|/watch?v=|/watch?.+&v=))([\w-]{11})(?:.+)?$#x';
        preg_match($pattern, $this->video_link, $matches);
        return (isset($matches[1])) ? $matches[1] : false;
    }

    //Slug 
    public function path()
    {
        return url("/lesson/{$this->id}-".Str::slug($this->title));
    }

    //Relation between Users and Lessons ( One-to-Many )
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //Relation between Services and Lessons ( One-to-Many )
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
    
}
