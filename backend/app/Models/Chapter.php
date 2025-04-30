<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'story_id'];

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
