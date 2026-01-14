<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    // protected $fillable=[
    //     'title',
    //     'image',
    //     'hour',
    //     'price',
    //     'content',
    // ];
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}