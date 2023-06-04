<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;
    protected  $fillable =['student_name','group_id'];

    public function group(){
       return $this->belongsTo(group::class);
    }

    public function courses(){
        return $this->belongsToMany(courses::class);//في وسيط تاني اذا جدول المشترك ماسميتو متل مو  معترف بلارفيل
     }
}
