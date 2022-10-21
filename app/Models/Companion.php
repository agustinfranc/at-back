<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Companion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'cuit', 'nationality', 'birthday', 'phone', 'max_taxable', 'monotax', 'criminal_record', 'insurance', 'has_sign_contract'];

    protected $casts = [
        'cuit' => 'integer',
        'phone' => 'integer',
        'monotax' => 'boolean',
        'monotax' => 'boolean',
        'criminal_record' => 'boolean',
        'insurance' => 'boolean',
        'has_sign_contract' => 'boolean',
    ];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class)->using(Assignment::class);
    }

    public function name(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucwords($value)
        );
    }
}
