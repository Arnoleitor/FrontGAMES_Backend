<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [

        'iduser', 'friend','message'

    ];
    public function users()

    {
        return $this->hasOne(User::class);
    }

    
}
