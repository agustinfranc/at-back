<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Assignment;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function companions()
    {
        return $this->belongsToMany(Companion::class)->using(Assignment::class);
    }

    public function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucwords($value)
        );
    }

    public function guardianName(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucwords($value)
        );
    }
}
