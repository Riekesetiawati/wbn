<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'image',
        'location',
        'location_url',
        'angkatan_ecp'
    ];

   

    public function participants()
{
    return $this->belongsToMany(User::class, 'event_participants', 'event_id', 'user_id');
}

public function company()
{
    return $this->hasMany(CompanyExport::class, 'event_id', 'id');
}
}
