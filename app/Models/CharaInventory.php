<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CharaInventory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_characters_id',
        'data_items_id',
        'status'
    ];

    public function DataItem(){
        return $this->belongsTo(DataItem::class, 'data_items_id');
    }
}
