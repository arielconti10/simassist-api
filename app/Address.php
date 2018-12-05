<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
   protected $fillable = [
       'address',
       'number',
       'address_complement',
       'postal_code',
       'state_id',
       'city_id',
       'clients_id'
   ];

   public function clients(){
       return $this->belongsTo('App\Client', 'clients_id');
   }
}
