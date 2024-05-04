<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaleParent extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'fathername', 'fatherfamilyname', 'fmobile', 'ftelephone', 'fpostcode', 'faddress'];

    public function Children(){
        return $this->hasMany(Children::class);
    }
}
