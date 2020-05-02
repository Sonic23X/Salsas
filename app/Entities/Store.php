<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Store extends Model
{
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable =
  [
    'name', 'address', 'phone', 'street', 'number',
    'suburb', 'state', 'postal', 'user_id',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden =
  [
    'updated_at', 'created_at', 'deleted_at'
  ];

  //relaciones
  public function orders(){
       return $this->hasMany('App\Entities\Order');
  }

  public function owner(){
       return $this->belongsTo('App\User');
  }

  public function user()
  {
      return User::find($this->user_id)->select('name')->first();
  }



}
