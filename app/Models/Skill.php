<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Skill extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    public function cat(){
        return $this->belongsTo(Cat::class);
    }
    public function exams(){
        return $this->hasMany(Exam::class);
    }
    public function name($lang=null){
        $lang=$lang??App::getLocale();

            return json_decode($this->name)->$lang;
    }

    public function student_no(){
        $students_num=0;
        foreach($this->exams as $exam){
        $students_num+=$exam->users()->count();
        }
        return $students_num;
    }
}
