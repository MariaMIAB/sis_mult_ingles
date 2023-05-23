<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media_Resource extends Model
{
    use HasFactory;
    protected $fillable = [
        'theme_id',
        'link_video',
        'description',
        'book',
    ];
    public function themes()
    {
        return $this->belongsTo(Theme::class);
    }
}
