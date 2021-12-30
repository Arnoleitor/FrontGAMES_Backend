<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = [
        'iduser1', 'iduser2'

    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
