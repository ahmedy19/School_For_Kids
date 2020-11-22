<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //To protect entered data

    //Relation between Roles and Users (Many to Many)
    public function users()
    {
        return $this->belnogsToMany('App\User');
    }


    
}
