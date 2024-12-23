<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Weather;

class Condition extends Model
{
    use HasFactory;

    //一つの体調データは1つの天気データをもつ
    public function weather()
    {
        return $this->hasOne(Weather::class);
    }

    //一つの体調データは1人のユーザーに紐づく
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
