<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transmittor()
    {
        return $this->belongsTo(User::class,'transmitter');
    }

    public function userReceptor()
    {
        return $this->belongsTo(User::class,'receptor');
    }

    public function test()
    {
        return "Heide";
    }
}
