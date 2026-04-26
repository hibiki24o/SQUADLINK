<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'game_id',
        'title',
        'body',
        'platform',
        'vc_flag',
        'beginner_flag',
        'play_time',
        'recruit_count',
        'status',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
}