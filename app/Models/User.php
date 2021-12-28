<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $fillable = [
        'name',
        'role',
        'age',
        'surname',
        'nickname',
        'favoritegame',
        'city',
        'email',
        'password',
        'idpsn',
        'idsteam',
        'idxbox',
        'idnintendo',
        'idepicgames',
        'idactivision',
        'idblizzard',
        'idriotgames',
        'iduplay',
        'idbattlenet',
        'idbethesda'
    ];
}
