<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use \App\Models\Announcements;
use \App\Models\Penalprovision;
use App\Models\Decree;
use App\Models\Notice;
class KuwaiToday extends Model
{
    protected $fillable = [
        'versionno', 'versiontype', 'versiondate', 'versionfile'
    ];
    protected $withCount = ['Announcements', 'Provisions', 'Directives', 'Decrees', 'Notices'];
    protected $with = ['Announcements', 'Provisions', 'Directives', 'Decrees', 'Notices'];

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

    public function Decrees()
    {
        return $this->hasMany(Decree::class, 'kuwai_todays_id');
    }

    public function Notices()
    {
        return $this->hasMany(Notice::class, 'kuwai_todays_id');
    }
}
