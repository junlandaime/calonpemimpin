<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'office',
        'party',
        'position',
        'image',
        'twitter',
        'facebook',
        'instagram',
        'background',
        'policies',
        'experience',
        'voting_record',
    ];

    protected $casts = [
        'policies' => 'array',
        'experience' => 'array',
        'voting_record' => 'array',
    ];
}
