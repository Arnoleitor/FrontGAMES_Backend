<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'iduser', 'title', 'text','image'

    ];
    public function coments()
    {
        return $this->hasMany(Coment::class);
    }
    public function users()
    {
        return $this->hasOne(User::class);
    }
  
}
