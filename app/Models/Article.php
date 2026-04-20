<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'contenu', 'user_id'];

// Un article appartient à un seul utilisateur (Many-to-One)
public function user()
{
return $this->belongsTo(User::class);
}

// Un article peut avoir plusieurs tags (Many-to-Many)
public function tags()
{
return $this->belongsToMany(Tag::class);
}
}