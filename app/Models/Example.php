<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_id',
        'example_text',
        'example_image',
    ];

    public function contents()
    {
        return $this->belongsTo(Content::class);
    }
}
