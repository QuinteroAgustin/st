<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     *
     * @return \resources\Views\View
     */
    public function dashboard()
    {
        return view('dashboard');
    }
}
