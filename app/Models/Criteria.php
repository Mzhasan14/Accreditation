<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'criteria';
    protected $fillable = ['name'];

    public function sections()
    {
        return $this->hasMany(AccreditationSection::class);
    }
}

