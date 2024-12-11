<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Condition;

class Weather extends Model
{
    use HasFactory;

    //一つの天気データは1つの体調データに紐づく
    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }
}
