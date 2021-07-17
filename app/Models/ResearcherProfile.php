<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearcherProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'country_id',
        'region_id',
        'university_id',
        'faculty_id',
        'school_id',
        'goal_degree',
        'current_degree',
        'advisor',
    ];
    public $with = [];

}
