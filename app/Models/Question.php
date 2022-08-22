<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'content',
        'category_id',
        'question_id',
        'correct',
        'answer',
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function categories()
    {
        return $this->belongTo(Category::class);
    }
    public function exams()
    {
        return $this->belongToMany(Exam::class, 'exam_question');
    }
}
