<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Shops extends Model
{
    use HasFactory;
    
    public function goods(){
        return $this->belongsToMany(Goods::class)->withPivot('available');
    }

    public function employees(){
        return $this->hasMany(employees::class, 'employees_id');
    }
}
