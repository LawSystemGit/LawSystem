<?php

namespace App\Models;

use App\Models\KuwaiToday;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'kuwai_todays_id', 'noticesource', 'noticedate', 'noticebody',
    ];

    public function kuwaitVersion()
    {
        return $this->belongsTo(KuwaiToday::class, 'kuwai_todays_id');
    }
}
