<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StartScene extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'races_id',
        'story_text',
        'choice'
    ];

    public function races(){
        return $this->belongsTo(Race::class, 'races_id');
    }
}
