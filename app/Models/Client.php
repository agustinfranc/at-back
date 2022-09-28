<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','dni','phone','rate','taxable','comments','address','guardian_name','birthday','medicine','diagnosis',
    'job_description','health_insurance','affiliate','budget_date'];
}
