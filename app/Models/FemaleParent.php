<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FemaleParent extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'mothername', 'motherfamilyname', 'mmobile', 'mtelephone', 'mpostcode', 'maddress'];

    public function children(){
        return $this->hasMany(Children::class);
    }
}
