<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Assignment;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'dni', 'phone', 'rate', 'taxable', 'comments', 'address', 'guardian_name', 'birthday', 'medicine', 'diagnosis',
        'treatment', 'health_insurance', 'affiliate', 'budget_date'
    ];

    protected $cast = [
            'name' => 'string',
            'dni' => 'integer',
            'phone' => 'string',
            'extra_phone' => 'string',
            'rate' => 'float',
            'taxable' => 'integer',
            'comments' => 'string',
            'address' => 'string',
            'guardian_name' => 'string',
            'birthday' => 'date',
            'medicine' => 'string',
            'diagnosis' => 'string',
            'treatment' => 'string',
            'health_insurance' => 'string',
            'affiliate' => 'string',
            'budget_date' => 'date',
    ];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function companions()
    {
        return $this->belongsToMany(Companion::class)->using(Assignment::class);
    }
}
