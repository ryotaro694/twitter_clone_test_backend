<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Favorite;
class tweet extends Model
{
    protected $guarded = array('id');
    protected $dates = ['display_date'];

    public static $rules = array(
        'tweet'=>'between:1,140',
        'file' => 'image|file'
    );

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function favorite(){
        return $this->hasMany('App\Models\Favorite');
    }

    public function favorite_number()
    {
        return $this->belongsToMany(self::class, '', 'following_id', 'followed_id');
    }
}
