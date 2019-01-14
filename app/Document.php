<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename',
        'document_type',
        'client_id',
    ];


    public function client() {
        return $this->belongsTo( 'App\Client', 'client_id');
    }
}
