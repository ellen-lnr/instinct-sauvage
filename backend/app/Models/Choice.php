<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'chapter_id', 'next_chapter_id', 'story_id'];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
