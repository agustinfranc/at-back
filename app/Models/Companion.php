<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Companion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','cuit','nationality','birth','phone','max_taxable','monotax','criminal_record','insurance'];

}
