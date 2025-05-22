<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccreditationSection extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function entries()
    {
        return $this->hasMany(AccreditationEntry::class, 'section_id');
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class, 'criteria_id');
    }
}
