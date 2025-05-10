<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Perpustakaan;
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
    public function index(): View
    {//setelah login diarah kan ke halaman perpustakaan
        $Perpustakaans = Perpustakaan::all();
        return view('Perpustakaan', ['Perpustakaans' => $Perpustakaans]);
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        // Periksa apakah pengguna sudah terautentikasi dan memiliki role admin
        if (Auth::check() && Auth::user()->type === 'admin') {
            // Jika admin, lanjut ke halaman admin
            $Perpustakaans = Perpustakaan::all();
            return view('Perpustakaans.index', compact('Perpustakaans'));
        } else {
            // Jika pengguna belum terautentikasi atau bukan admin, arahkan ke halaman login
            return redirect()->route('login');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }
}