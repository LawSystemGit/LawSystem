<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\KuwaiToday;

class Decision extends Model
{
    protected $fillable = [
        'kuwai_todays_id', 'decisionsource', 'decisionno', 'decisiontitle', 'decisionbody', 'decisiondate'
    ];

    public function kuwaitVersion()
    {
        return $this->belongsTo(KuwaiToday::class, 'kuwai_todays_id');
    }
}
