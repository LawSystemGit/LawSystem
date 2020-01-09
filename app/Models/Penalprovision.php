<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\KuwaiToday;
class Penalprovision extends Model
{
    protected $fillable = [
        'kuwai_todays_id','provisiondate','caseno','policestation','provisionbody'
    ];
    public function kuwaitVersion()
    {
        return $this->belongsTo(KuwaiToday::class,'kuwai_todays_id');
    }
}
