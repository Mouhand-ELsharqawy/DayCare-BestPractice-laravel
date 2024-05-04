<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Children extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id','male_parents_id', 'female_parents_id', 'name', 'gender', 'dob', 'class', 'currentlocation'];

    public function child(){
        return $this->hasMany(Child::class);
    }

    public function femaleparent(){
        return $this->belongsTo(FemaleParent::class);
    }
    
    public function maleparent(){
        return $this->belongsTo(MaleParent::class);
    }
}
