<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrator extends Authenticatable
{

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
    ];



    ################################ Relations ##################################


    public function admin()
    {
        return $this->morphOne(Admin::class, 'adminable');
    }

}
