<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;

    public function reviews(){
        return $this->hasMany(GoodsReviews::class, 'goods_id');
    }

    public function shops(){
        return $this->belongsToMany(Shops::class)->withPivot('available');
    }
}
