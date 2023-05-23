<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme_User extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'theme_id',
        'visits',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function theme()
    {
        return $this->belongsTo(Test::class);
    }
}
