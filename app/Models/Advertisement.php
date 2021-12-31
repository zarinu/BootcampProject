<?php

namespace App\Models;

use App\Http\Controllers\Front\AdvertisementController;
use App\Http\Controllers\user\AdvertisementController as UserAdvertisementController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Advertisement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'desc',
        'price',
        'adress',
        'mobileNo',
        'category_id',
        'user_id',
    ];

    protected static function booted()
    {
        static::addGlobalScope('desc', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }

    private static function convertTime($zaman)
    {
        $time = time() - strtotime($zaman); // to get the time since that moment
        $time = ($time < 1) ? 1 : $time;
        $tokens = array(
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            $resault = $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
            return $resault . ' ago';
        }
    }

    public function getCreated_at()
    {
        return Advertisement::convertTime($this->created_at);
    }
    public static function findNcheck(UserAdvertisementController $userController, $action, $adID)
    {
        $ade = Advertisement::find($adID);
        if (empty($ade)) abort(404);
        $userController->authorize($action, $ade);
        return $ade;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'ads_id');
    }
}
