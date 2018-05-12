<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisMustahiq;
use App\Mustahiq;
use Response;

class MustahiqController extends Controller
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

    public function showJenis()
    {
        $jenises = JenisMustahiq::all();
        
        return view('mustahiq.jenis-mustahiq', compact('jenises'));
    }

    public function getJenis($id)
    {
        $hasil = JenisMustahiq::findOrfail($id);
        return Response::json($hasil);
    }

    public function updateJenis($id)
    {
        $jenis = JenisMustahiq::findOrfail($id);
        $jenis->jenis = request('jenis');
        $jenis->keterangan = request('keterangan');
        $jenis->jumlah_bagian = request('jumlah_bagian');
        $jenis->save();
        
        return redirect()->back()->withSuccess('Jenis Mustahiq '.$jenis->jenis.' Berhasil Dirubah');
    }
}
