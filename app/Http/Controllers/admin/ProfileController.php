<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index(Request $request)
    {
        // Handle profile logic
        return view('admin.profile.index');
    }
}
