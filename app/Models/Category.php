<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'parent_id',
        'name_en',
    ];
    // nemidonam dorost nevashtam ya na!!
    // =>>> vali man midonam ^__^ `zarinu`
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
}
