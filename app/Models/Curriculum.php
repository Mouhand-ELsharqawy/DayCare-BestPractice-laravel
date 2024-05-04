<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curriculum extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['id', 'employees_id', 'season', 'agegroup', 'numberofdays', 'hoursperweek', 'description'];

    protected $table = 'curriculum';

    
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
