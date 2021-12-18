<?php

namespace App\Models;

use App\Http\Controllers\Front\AdvertisementController;
use App\Http\Controllers\user\AdvertisementController as UserAdvertisementController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
