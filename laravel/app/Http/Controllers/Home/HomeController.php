<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
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
        $posts = Post::where('active', 1)->orderByDesc('created_at')->take(5)->get();
        dd($posts);
        return view('home', ['posts' => $posts]);
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
