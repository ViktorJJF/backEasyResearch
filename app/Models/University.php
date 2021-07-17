<?php

namespace App\Models;

use App\Models\Level;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = ["name",
        "region_id",
        "level_id",
        "status"];

    public $with = ['region', 'level'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }
}
