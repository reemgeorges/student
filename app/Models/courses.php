<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    protected  $fillable =['course_name'];
    use HasFactory;

    public function students(){
        return $this->belongsToMany(students::class);
     }
}
