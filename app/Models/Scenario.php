<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scenario extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'rarity',
        'story_text',
        'choice1',
        'response1',
        'cons1',
        'effect1',
        'choice2',
        'response2',
        'cons2',
        'effect2',
        'choice3',
        'response3',
        'cons3',
        'effect3',
        'choice4',
        'response4',
        'cons4',
        'effect4',
        'failed_text',
        'failed_cons',
        'failed_eff',
        'req1',
        'req2',
        'req3',
        'req4',
        'min1',
        'min2',
        'min3',
        'min4'
    ];
}
