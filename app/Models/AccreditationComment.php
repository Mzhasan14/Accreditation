<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccreditationComment extends Model
{
    use HasFactory;

    protected $fillable = ['entry_id', 'user_id', 'comment'];

    public function entry()
    {
        return $this->belongsTo(AccreditationEntry::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
