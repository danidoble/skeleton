<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;

//    protected $table = 'users';
//    protected $primaryKey = 'id';
//    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
//        'email_verified_at' => 'datetime',
    ];

}