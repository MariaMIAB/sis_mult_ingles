<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme_id',
        'content_name',
        'content_text',
        'content_image',
    ];

    public function themes()
    {
        return $this->belongsTo(Theme::class);
    }
    public function example()
    {
        return $this->hasMany(Example::class);
    }
}
