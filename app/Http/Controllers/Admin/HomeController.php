<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
use App\Models\Test;
use App\Models\Theme;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::count();
        $theme = Theme::count();
        return view('admin.home', compact('user', 'theme'));
    }
}
