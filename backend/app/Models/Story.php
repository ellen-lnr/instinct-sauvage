<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function ends()
    {
        return $this->hasMany(End::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
