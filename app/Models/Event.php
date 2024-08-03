<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'detail', 'start_date', 'end_date'
    ];

    public function eventDetails()
    {
        return $this->hasMany(EventDetail::class, 'eventID', 'id');
    }
}
