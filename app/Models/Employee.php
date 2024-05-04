<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'name', 'address', 'salary', 'maritalstatus', 'socialsecurity', 'education', 'startdate', 'enddate'];

    public function option(){
        return $this->hasMany(Curriculum::class);
    }
    public function main(){
        return $this->hasMany(MainOffice::class);
    }
    public function program(){
        return $this->hasMany(Program::class);
    }
}
