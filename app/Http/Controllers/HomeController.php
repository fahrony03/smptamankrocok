<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;

        if (Auth::check()) {
            if ($role == 'Admin' || $role == 'Guru' || $role == 'Murid' || $role == 'Staf' || $role == 'Perpustakaan') {

              $event = Events::where('is_active','0')->first();

              return view('backend.website.home', compact('event'));
            } elseif($role == 'Guest' || $role == 'PPDB') {
                return view('ppdb::backend.index');
            }
        }
    }
}
