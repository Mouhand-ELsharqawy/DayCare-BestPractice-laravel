<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consumables extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'fingerpaint', 'paper', 'cleaningsupplies', 'sippycubs', 'spoons', 'crayons', 'garbagebag', 'diabers', 'forks', 'penciles', 'bowls', 'babywipes'];
}
