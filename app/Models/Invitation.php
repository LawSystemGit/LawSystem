<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\KuwaiToday;

class Invitation extends Model
{
    protected $fillable = [
        'kuwai_todays_id' , 'invitationsource' , 'invitationbody' ,
    ];

    public function kuwaitVersion ()
    {
        return $this->belongsTo (KuwaiToday::class , 'kuwai_todays_id');
    }
}
