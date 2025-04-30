<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class End extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'description', 'story_id'];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
