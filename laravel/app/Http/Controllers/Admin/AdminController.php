<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the home view.
     *
     * @return \resources\Views\View
     */
    public function home()
    {
        return view('admin.dashboard');
    }
}
