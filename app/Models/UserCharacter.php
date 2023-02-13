<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCharacter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'users_id',
        'races_id',
        'chara_classes_id',
        'strength',
        'intelligence',
        'dexterity',
        'charisma',
        'defense',
        'max_health',
        'current_health',
        'max_mana',
        'current_mana',
        'level',
        'exp_count',
        'exp_cap'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }

    public function races(){
        return $this->belongsTo(Race::class, 'races_id');
    }

    public function charaClass(){
        return $this->belongsTo(CharaClass::class, 'chara_classes_id');
    }

    public function inventory(){
        return $this->HasMany(CharaInventory::class, 'user_characters_id');
    }

    public function equipment(){
        return $this->hasOne(CharaEquipment::class, 'user_characters_id');
    }
}
