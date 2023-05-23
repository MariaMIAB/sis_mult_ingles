<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_id',
        'problem',
        'clauseA',
        'clauseB',
        'clauseC',
        'clauseD',
        'correct_answer',
    ];
    public function tests()
    {
        return $this->belongsTo(Test::class);
    }

}
