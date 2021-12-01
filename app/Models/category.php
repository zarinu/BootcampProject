<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'parent_id',
        'name_en',
    ];
    // nemidonam dorost nevashtam ya na!!
    public function Ads()
    {
        return $this->hasMany(Ads::class);
    }
}
