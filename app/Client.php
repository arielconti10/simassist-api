<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'document',
        'mother_name',
        'email',
        'contract_type',
        'birth_date',
        'telephone',
        'status'
    ];

    public function address(){
        return $this->hasOne('App\Address');
    }

    public function documents(){
        return $this->hasMany('App\Document');
    }
}
