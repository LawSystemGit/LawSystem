<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\KuwaiToday;
class Decree extends Model
{
    protected $fillable = [
        'kuwai_todays_id','decreesource','decreeno','decreeyear','decreetitle','decreebody'
    ];
    public function kuwaitVersion()
    {
        return $this->belongsTo(KuwaiToday::class,'kuwai_todays_id');
    }
}
