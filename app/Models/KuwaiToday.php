<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KuwaiToday extends Model
{
    protected $fillable = [
        'versionno', 'versiontype', 'versiondate', 'versionfile'
    ];
}
