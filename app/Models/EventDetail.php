<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDetail extends Model
{
    use HasFactory;

    protected $table = 'event_details';

    protected $fillable = [
        'eventID',
        'userID',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'eventID', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'id');
    }

}
