<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //Relation between Users and Roles (Many to Many)
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    //Check if User has Any Roles (Multiple Roles)
    public function hasAnyRoles($roles)
    {
        return null !== $this->roles()->whereIn('role',$roles)->first();
    }

    //Check if User has Any Role (Single Role)
    public function hasAnyRole($role)
    {
        return null !== $this->roles()->where('role',$role)->first();
    }


    //Relation between Users and Profiles ( One-to-One )
    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }

    //Relation between Users and Services ( One-to-Many )
    public function services()
    {
        return $this->hasMany('App\Service');
    }

    //Relation between Users and Lessons ( One-to-Many )
    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

}
