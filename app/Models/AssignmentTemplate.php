<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentTemplate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'enabled' => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function companion()
    {
        return $this->belongsTo(Companion::class);
    }

    public function days()
    {
        return $this->belongsToMany(Day::class)
            ->withPivot('hours', 'from', 'to')
            ->withTimestamps();
    }
}
