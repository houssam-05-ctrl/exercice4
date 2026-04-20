<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

// Un tag peut appartenir à plusieurs articles
public function articles()
{
return $this->belongsToMany(Article::class);
}
}