<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThesisTemplate extends Model
{
    use HasFactory;
    protected $fillable = [
        'university_id',
        'template',
        'style',
        'coverPage',
    ];
    public $with = [];
}
