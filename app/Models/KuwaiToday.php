<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Announcements;
class KuwaiToday extends Model
{
    protected $fillable = [
        'versionno', 'versiontype', 'versiondate', 'versionfile'
    ];
    protected $withCount = ['Announcements', 'Provisions'];
    protected $with = ['Announcements', 'Provisions'];

    public function Announcements()
    {
        return $this->hasMany(Announcements::class, 'kuwai_todays_id');
    }

    public function Provisions()
    {
        return $this->hasMany(Penalprovision::class, 'kuwai_todays_id');
    }


}
