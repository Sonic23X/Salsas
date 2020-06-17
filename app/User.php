<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rol'
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

    public function getIsAdminAttribute()
    {
  		return $this->attributes['rol'] == 'admin';
  	}

    public function getIsSellerAttribute()
    {
  		return $this->attributes['rol'] == 'vendedor';
  	}

    public function getIsDeliveryAttribute()
    {
  		return $this->attributes['rol'] == 'repartidor';
  	}

    public function getIsStoreAttribute()
    {
  		return $this->attributes['rol'] == 'tienda';
  	}

    public function stores()
    {
        return \App\Entities\Store::where('user_id',$this->id)->get();
    }
}
