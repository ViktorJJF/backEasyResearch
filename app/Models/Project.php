<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "projectId",
        "configStatus",
        "title",
        "type",
        "studyLevel",
        "dedicatedTime",
        "lastAccessedTime",
    ];

    public $with = [
    ];
}
