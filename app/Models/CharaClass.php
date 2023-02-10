<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CharaClass extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'name',
        'health_boost',
        'mana_boost',
        'char_boost'
    ];

    protected $append = ['media'];

    protected $dates = ['deleted_at'];

    public function getGalleryAttribute()
    {
        return $this->getMedia('media');
    }

    public function userChara(){
        return $this->hasMany(UserCharacter::class, 'races_id');
    }
}
