<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\KuwaiToday;
class Directives extends Model
{
    protected $fillable = [
        'kuwai_todays_id','directivesource','directiveno','directiveyear','directivetitle','directivebody'
    ];

    public function kuwaitVersion()
    {
        return $this->belongsTo(KuwaiToday::class,'kuwai_todays_id');
    }
}
