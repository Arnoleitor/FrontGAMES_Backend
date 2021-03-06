<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    use HasFactory;
    protected $fillable = [

        'iduser', 'idpost', 'coment'

    ];
    
    public function posts()
    {
        return $this->hasOne(Post::class);
    }
    public function users()
    {
        return $this->hasOne(User::class);
    }
}
