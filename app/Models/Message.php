<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'idchat', 'idfriends', 'message'

    ];
    
    public function chats()

    {
        return $this->hasOne(Chat::class);
    }
}
