<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CharaEquipment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_characters_id',
        'head',
        'body',
        'weapon',
        'accessories1',
        'accessories2',
        'foot'
    ];

    public function Head(){
        return $this->belongsTo(CharaInventory::class, 'head');
    }
    
    public function Body(){
        return $this->belongsTo(CharaInventory::class, 'body');
    }

    public function Weapon(){
        return $this->belongsTo(CharaInventory::class, 'weapon');
    }

    public function Accessories1(){
        return $this->belongsTo(CharaInventory::class, 'accessories1');
    }

    public function Accessories2(){
        return $this->belongsTo(CharaInventory::class, 'accessories2');
    }

    public function Foot(){
        return $this->belongsTo(CharaInventory::class, 'foot');
    }

    public function userChara(){
        return $this->belongsTo(UserCharacter::class, 'user_characters_id');
    }
}
