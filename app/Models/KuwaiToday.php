<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Announcements;
use \App\Models\Penalprovision;
use App\Models\Decree;
use App\Models\Notice;
use App\Models\Decision;
use App\Models\MeetingRecord;

class KuwaiToday extends Model
{
    protected $fillable = [
        'versionno', 'versiontype', 'versiondate', 'versionfile'
    ];
    protected $withCount = ['Announcements', 'Provisions', 'Directives', 'Decrees', 'Notices', 'Decisions', 'MeetingRecords'];
    protected $with = ['Announcements', 'Provisions', 'Directives', 'Decrees', 'Notices', 'Decisions', 'MeetingRecords'];

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

    public function Decisions()
    {
        return $this->hasMany(Decision::class, 'kuwai_todays_id');
    }

    public function MeetingRecords()
    {
        return $this->hasMany(MeetingRecord::class, 'kuwai_todays_id');
    }
}
