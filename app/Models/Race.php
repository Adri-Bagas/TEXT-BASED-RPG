<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;

class Race extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'name',
        'str_boost',
        'int_boost',
        'dex_boost',
        'def_boost'
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

    public function startScene(){
        return $this->hasMany(StartScene::class, 'races_id');
    }
}
