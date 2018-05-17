<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\JenisZakat;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = DB::table('transaksis')->whereYear('created_at', date('Y'))
        ->selectRaw("SUM(jiwa) AS Jiwa, SUM(beras_fitrah) AS Beras, SUM(uang_fitrah) AS Uang, SUM(fidyah) AS Fidyah, SUM(zakat_maal) AS Maal, SUM(infaq) AS Infaq")
        ->first();

        $jenis = JenisZakat::select('id','jenis')->orderBy('id', 'DESC')->take(4)->get();

        $jenispopuler = DB::table('transaksis')
                        ->selectRaw('( SELECT COUNT(jeniszakat_id) FROM transaksis WHERE jeniszakat_id='.$jenis[0]->id.') AS jenis1, ( SELECT COUNT(jeniszakat_id) FROM transaksis WHERE jeniszakat_id='.$jenis[1]->id.') AS jenis2, ( SELECT COUNT(jeniszakat_id) FROM transaksis WHERE jeniszakat_id='.$jenis[2]->id.') AS jenis3, ( SELECT COUNT(jeniszakat_id) FROM transaksis WHERE jeniszakat_id='.$jenis[3]->id.') AS jenis4, ( SELECT COUNT(jeniszakat_id) FROM transaksis WHERE jeniszakat_id=1) AS beras, ( SELECT COUNT(jeniszakat_id) FROM transaksis WHERE jeniszakat_id=2) AS maal')
                        ->groupBy('jeniszakat_id')
                        ->first();

        return view('home', compact('report','jenispopuler','jenis'));
    }
}
