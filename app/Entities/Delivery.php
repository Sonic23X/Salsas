<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use DB;

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
     public static function getListing() {
        $list = DB::table('deliveries')
            ->leftJoin('deliveries_detail', 'deliveries.id', '=', 'deliveries_detail.delivery_id')
            ->get();
        return $list;
     }
     public static function getDeliveredSalsas() {
         $salsas = DB::table('deliveries_detail')->count('salsa_id');
         return $salsas;
     }
      public static function getMountReceived() {
         $mount = Delivery::sum('mount_received');
         return $mount;
     }
}
