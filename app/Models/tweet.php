<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tweet extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
        'tweet'=>'between:1,140',
    );

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
