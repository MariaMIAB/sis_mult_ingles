<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme_name',
        'theme_image',
        'description',

    ];
    public function theme_user()
    {
        return $this->hasMany(Theme_User::class);
    }
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
    public function content()
    {
        return $this->hasMany(Content::class);
    }
    public function media_resource()
    {
        return $this->hasMany(Media_Resourse::class);
    }
    public function test()
    {
        return $this->hasMany(Test::class);
    }
}
