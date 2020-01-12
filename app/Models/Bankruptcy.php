<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\KuwaiToday;
class Bankruptcy extends Model
{
    protected $fillable = [
        'kuwai_todays_id' , 'bankruptcysource' , 'bankruptcyagainst' , 'bankruptcyjudg' ,
        'bankruptcydate' , 'bankruptcybody'
    ];

    public function kuwaitVersion ()
    {
        return $this->belongsTo (KuwaiToday::class , 'kuwai_todays_id');
    }
}
