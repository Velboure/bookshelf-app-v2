<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    
public $timestamps = false;

protected $fillable = [
    'title',
    'author',
    'cover',
    'genre',
    'publisher_id',
    
];
public function publisher()
{
    return $this->belongsTo(Publisher::class);
}
protected function cast(array $attributes): array
{
    return [
        'title' => (string) $attributes['title'],
        'author' => (string) $attributes['author'],
        'cover' => (string) $attributes['cover'],
        'genre' => (string) $attributes['genre'],
    ];
}
}   