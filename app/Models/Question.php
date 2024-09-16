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
    ];


    protected $casts = [
        'is_mandatory' => 'boolean',
    ];
}
