<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //To protect entered data
    protected $fillable = ['phone_number','age','first_address','second_address',
                            'city','province','facebook','twitter'
                            ,'github','image','biography'];


    // To Upload Image
    protected $appends = ['image_path'];

    /**
     * get Image Path For any images
     *
     * @return void
     */
    public function getImagePathAttribute()
    {
        return asset('uploads/profile/' . $this->image);
    }


}
