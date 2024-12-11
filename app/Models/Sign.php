<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Sign extends Model
{
    use HasFactory;

    //一つのサインは1人のユーザーに紐づく
    public function user(){
        return $this->belongsTo(User::class);
    }
}
