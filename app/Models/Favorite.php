<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ads_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
}
