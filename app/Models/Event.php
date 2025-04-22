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
        'location_url'
    ];

   

    public function participants()
{
    return $this->belongsToMany(User::class, 'event_participants', 'event_id', 'user_id');
}
}
