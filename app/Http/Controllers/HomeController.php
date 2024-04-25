<?php

namespace App\Http\Controllers;

use App\Models\Menu; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //controller unutk menampilkan menu ==> By Frada
    public function index()
    {
        $menus = Menu::all();
        return view('home', compact('menus'));
    }
}
