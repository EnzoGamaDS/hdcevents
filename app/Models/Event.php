<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'itens' => 'array'
    ];
    protected $dates = ['date'] ;

    protected $guarded = [];

    //pq só uu usuario é dono 
    //Event belongsTo User - event pertence a usuario
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
