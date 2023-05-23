<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'theme_id',
        'test_name',
        'description',

    ];
    public function test_user()
    {
        return $this->hasMany(Test_User::class);
    }
    public function question()
    {
        return $this->hasMany(Question::class);
    }
}
