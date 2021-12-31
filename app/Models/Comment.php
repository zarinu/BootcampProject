<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'ads_id',
        'body',
        'is_status' //baraye comment haee ke mored taeed admine va mitune namayesh dade beshe
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class, 'ads_id');
    }

    protected static function booted()
    {
        static::addGlobalScope('desc', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }
}
