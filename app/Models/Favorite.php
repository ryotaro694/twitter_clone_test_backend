<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $primaryKey = [
        'user_id',
        'tweet_id'
    ];
    protected $fillable = [
        'user_id',
        'tweet_id'
    ];
    public $incrementing = false;
    public $timestamps = false;
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function tweet(){
        return $this->belongsTo('App\Models\tweet');
    }
}

