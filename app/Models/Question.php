<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';


    protected $fillable = [
        'question_text',
        'category',
        'type',
        'is_mandatory',
        'order',
        'followup_question_id',
        'followup_question_text', // New fields
    ];


    protected $casts = [
        'is_mandatory' => 'boolean',
    ];


    public function followupQuestion()
    {
        return $this->belongsTo(FollowupQuestion::class, 'followup_question_id');
    }
}
