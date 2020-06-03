<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use DB;

class Delivery extends Model
{
     protected $table = 'deliveries';

     protected $dates = ['deleted_at'];

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'order_id', 'delivery_man', 'delivery_date',
         'mount_received', 'total', 'note'
     ];

     public function man(){
          return $this->belongsTo('App\User','delivery_man','id');
     }
     public function order(){
          return $this->belongsTo('App\Entities\Order');
     }

     public function salsas(){
       return $this->belongsToMany('App\Entities\Salsa', 'deliveries_detail', 'delivery_id', 'salsa_id')->withPivot('quantity', 'price');;
     }

     public static function getDeliveredSalsas() {
         $salsas = DB::table('deliveries_detail')->sum('quantity');
         return $salsas;
     }
      public static function getMountReceived() {
         $mount = Delivery::sum('mount_received');
         return $mount;
     }

     public function total(){
         $total=0;
         $sum = $this->salsas->map(function ($item, $key) use($total) {
             return $item->pivot->price * $item->pivot->quantity;
         });

         return $sum->sum();
     }

     public function store( )
     {
       
     }
}
