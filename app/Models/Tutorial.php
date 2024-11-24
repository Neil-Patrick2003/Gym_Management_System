<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'tutorial_links', 'created_by', 'category_id'];

    public function category(){
        return $this->hasOne(Category::class);
    }
}