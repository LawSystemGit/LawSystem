<?php

namespace App\Models;

use App\Models\KuwaiToday;
use Illuminate\Database\Eloquent\Model;

class Correction extends Model
{
    protected $fillable = [
        'kuwai_todays_id' , 'correctionsource' , 'correctiondate' , 'correctionbody'
    ];

    public function kuwaitVersion ()
    {
        return $this->belongsTo (KuwaiToday::class , 'kuwai_todays_id');
    }
}
