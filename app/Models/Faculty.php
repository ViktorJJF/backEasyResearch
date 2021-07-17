<?php

namespace App\Models;

use App\Models\University;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'university_id',
        'status',
    ];
    public $with = [];
    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
