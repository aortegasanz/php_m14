<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author_name',
        'import',
        'entry_date',
        'shop_id',
    ];

    public function shop() {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

}
