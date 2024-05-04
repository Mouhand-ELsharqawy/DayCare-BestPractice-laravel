<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainOffice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'employees_id'];

    public function Employee(){
        return $this->belongsTo(Employee::class);
    }
}
