<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme_id',
        'exam_name',
        'description',
    ];

    public function test_note()
    {
        return $this->hasMany(Test_notes::class);
    }
    public function question()
    {
        return $this->hasMany(Question::class);
    }
}
