<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
use App\Models\Condition;

class Sign extends Model
{
    use HasFactory;

    //一つのサインは1人のユーザーに紐づく
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //一つのサインは複数の体調データに紐づく
    public function conditions():BelongsToMany
    {
        return $this->belongsToMany(Condition::class)->withTimestamps();
    }
}
