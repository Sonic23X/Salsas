<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
     protected $table = 'deliveries';

     public function delivery_man(){
          return $this->belongsTo('App\User','delivery_man');
     }
     public function order(){
          return $this->belongsTo('App\Entities\Order');
     }

     public function salsas(){
       return $this->belongsToMany('App\Entities\Salsa', 'deliveries_detail', 'delivery_id', 'salsa_id')->withPivot('quantity', 'price');;
     }
}
