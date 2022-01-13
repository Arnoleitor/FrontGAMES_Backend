<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'iduser',
        'idgroup'
    ];
    
    public function users()
    {
        return $this->hasOne(User::class);
    }
    
}
