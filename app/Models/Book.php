<?php

// app/Models/Book.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}