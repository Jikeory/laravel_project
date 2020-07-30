<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        return view('home');
    }

    public function changeLocale(Request $request)
    {
        $request->validate(['locale' => 'required|string']);
        if ($request->ajax()) {
            (new LoginController())->login($request);
        }
        $locale = $request->input('locale');
        if (in_array($locale, ['en', 'ch_cn'])) {
            App::setLocale($locale);
            $request->session()->put(['locale', $locale]);
        }
        return view('auth.login');
    }
}
