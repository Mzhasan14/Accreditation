<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    use HasFactory;

    protected $fillable = [
        'entry_id',
        'validator_id',
        'level',
        'status',
        'comments',
        'validated_at'
    ];

    public function entry()
    {
        return $this->belongsTo(AccreditationEntry::class);
    }

    public function validator()
    {
        return $this->belongsTo(User::class, 'validator_id');
    }
}
