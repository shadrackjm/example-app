<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;
    //mass assignable attributes
    protected $fillable = [
        'name',
        'description',
        'ingredients',
        'category_id',
        'instructions',
        'image',
    ];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
}
