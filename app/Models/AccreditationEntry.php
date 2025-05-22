<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccreditationEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'admin_id',
        'title',
        'description',
        'link',
        'photo_path',
        'status'
    ];

    public function section()
    {
        return $this->belongsTo(AccreditationSection::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function validations()
    {
        return $this->hasMany(Validation::class, 'entry_id');
    }

    public function comments()
    {
        return $this->hasMany(AccreditationComment::class, 'entry_id');
    }
}
