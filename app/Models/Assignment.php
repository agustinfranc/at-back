<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $with = ['client','companion','assignmentWeekday'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function companion()
    {
        return $this->belongsTo(Companion::class);
    }

    public function assignmentWeekday()
    {
        return $this->belongsTo(AssignmentWeekday::class);
    }
}
