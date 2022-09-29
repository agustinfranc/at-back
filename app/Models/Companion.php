<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Companion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'cuit', 'nationality', 'birthday', 'phone', 'max_taxable', 'monotax', 'criminal_record', 'insurance', 'has_sign_contract'];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class)->using(Assignment::class);
    }
}
