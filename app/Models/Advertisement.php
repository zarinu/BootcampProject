<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Advertisement extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function Comment()
    {
        return $this->hasMany(Comment::class, 'ads_id');
    }
}

