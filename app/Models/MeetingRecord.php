<?php

namespace App\Models;

use App\Models\KuwaiToday;
use Illuminate\Database\Eloquent\Model;

class MeetingRecord extends Model
{
    protected $fillable = [
        'kuwai_todays_id', 'meetingsource', 'meetingdate', 'meetingrecord'
    ];

    public function kuwaitVersion()
    {
        return $this->belongsTo(KuwaiToday::class, 'kuwai_todays_id');
    }
}
