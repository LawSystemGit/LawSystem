<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use \App\Models\Announcements;
use \App\Models\Penalprovision;
class KuwaiToday extends Model
{
    protected $fillable = [
        'versionno', 'versiontype', 'versiondate', 'versionfile'
    ];
    protected $withCount = ['Announcements', 'Provisions', 'Directives'];
    protected $with = ['Announcements', 'Provisions', 'Directives'];

    public function Announcements()
    {
        return $this->hasMany(Announcements::class, 'kuwai_todays_id');
    }

    public function Provisions()
    {
        return $this->hasMany(Penalprovision::class, 'kuwai_todays_id');
    }

    public function Directives()
    {
        return $this->hasMany(Directives::class, 'kuwai_todays_id');
    }

}
