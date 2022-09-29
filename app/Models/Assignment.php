<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory, SoftDeletes;

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
        return $this->belongsToMany(Day::class);
    }
}
