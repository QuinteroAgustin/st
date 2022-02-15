<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home view.
     *
     * @return \resources\Views\View
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Display the offre view.
     *
     * @return \resources\Views\View
     */
    public function offre()
    {
        return view('home.offre');
    }

    /**
     * Display the contact view.
     *
     * @return \resources\Views\View
     */
    public function contact()
    {
        return view('home.contact');
    }

    public function sendContact(Request $request){
        echo '<pre>';
        var_dump($request->nom);
        echo '</pre>';
    }
}
