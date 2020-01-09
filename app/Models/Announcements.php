<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\KuwaiToday;
class Announcements extends Model
{
    protected $fillable = [
        'kuwai_todays_id','announcource','announno','announctitle','announcbody'
    ];

    public function kuwaitVersion()
    {
        return $this->belongsTo(KuwaiToday::class,'kuwai_todays_id');
    }
}
