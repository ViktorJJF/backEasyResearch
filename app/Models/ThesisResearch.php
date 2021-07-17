<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThesisResearch extends Model
{
    public $table = "thesis_researches";
    use HasFactory;
    protected $fillable = [
        'project_id',
        'coverPage',
        'characteristics',
        'body',
        'references',
        'annexes',
        'images',
        'tables',
        'style',
        'researchIndexes',
    ];
    public $with = [];
    public function Project()
    {

        return $this->belongsTo(Project::class);
    }
}
