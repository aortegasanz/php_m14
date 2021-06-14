<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Picture;
use App\Models\Franchise;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'franchise_id',
    ];

    public function pictures() {
        return $this->hasMany(Picture::class);
    }

    public function franchise() {
        return $this->belongsTo(Franchise::class, 'franchise_id', 'id');
    }

}
