<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nameAm',
        'nameEn',
        'ingredientsAm',
        'ingredientsEn',
        'processAm',
        'processEn',
        'category_id',
        'image',
        'foodTime',
        'recommend'
    ];

    public function category (){
        return $this->belongsTo(Category::class);
    }
}

