<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'text',
        'reading_time',
        'image'
    ];

    public function Technology()
    {
        return $this->belongsTo(Technology::class);
    }
    public function Types()
    {
        return $this->belongsToMany(Type::class);
    }
}
