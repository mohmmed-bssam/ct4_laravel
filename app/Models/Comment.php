<?php

namespace App\Models;

use Dom\Comment as DomComment;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
        protected $guarded = [];
        protected $with = ['user'];

    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }
    public function courses(){
        return $this->belongsTo(Course::class)->withDefault();
    }
    public function replies(){
        return $this->hasMany(Comment::class,'reply_to');
    }
    public function parent(){
        return $this->belongsTo(Comment::class,'reply_to')
        ->withDefault();
    }
}