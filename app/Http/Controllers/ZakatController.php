<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisZakat;

class ZakatController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('zakat-list');
    }

    public function create()
    {
    	$jenis_zakats = JenisZakat::all();
    	return view('bayar-zakat', compact('jenis_zakats'));
    }
}
