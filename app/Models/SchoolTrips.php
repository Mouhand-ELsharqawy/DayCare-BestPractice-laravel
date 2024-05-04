<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolTrips extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'chaperone', 'schoollocation', 'cost', 'comments'];
}
