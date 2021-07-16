<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use HasFactory, LogsActivity;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nameAm',
        'nameEn',
        'descriptionAm',
        'descriptionEn',
        'coverImage',
    ];

    public function foods (){
        return $this->hasMany(Food::class);
    }

    /**
     * this is to relate the brand to the products of that brand
     *
     */
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
