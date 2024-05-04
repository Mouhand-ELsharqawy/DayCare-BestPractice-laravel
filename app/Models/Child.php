<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Child extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id','childrens_id', 'nappinghours', 'food', 'extrainfo', 'behavior', 'playinglocation', 'vaccine'];

    public function children(){
        return $this->belongsTo(Children::class);
    }
}
