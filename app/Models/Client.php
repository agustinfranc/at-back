<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Assignment;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name','dni','phone','rate','taxable','comments'];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
