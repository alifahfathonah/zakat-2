<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\JenisZakat;
use App\Transaksi;
use App\Muzakki;
use Response;

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

    public function create($id = null)
    {
        $jenis_zakats = JenisZakat::all();
        if ($id == null) {
           return view('bayar-zakat', compact('jenis_zakats'));
        } else{
            $idmuzakki = \base64_decode($id);
            $muzakki = Muzakki::findOrfail($idmuzakki);
            return view('bayar-zakat', compact('jenis_zakats','muzakki'));
        }
    	
    }

    public function cariMuzakki(Request $request, $nama){
        $queries = Muzakki::where('name', 'LIKE', '%'.$nama.'%')
            ->take(5)->get();
            $html = array();
        foreach($queries as $q){
            $url = url('/pelaksanaan-zakat/'.base64_encode($q->id).'');
            $html[] = "<tr>"
                ."<th>".$q->name."</th>"
                ."<th>".$q->alamat."</th>"
                ."<th>".$q->nohp."</th>"
                ."<th><a class'btn bg-indigo waves-effect' href='".$url."'><i class='material-icons'>launch</i></a></th>"
                ."</tr>";
        }
        
        return Response($html);
    }

    public function getNominal(Request $request, $nominal){
        $hasil = JenisZakat::find($nominal);
        return Response::json($hasil);
    }

    public function storeZakat(Request $request){
        if ($request->cek == "new") {
            $Muzakki = Muzakki::create([
                'name' => $request->nama,
                'email' => $request->email,
                'nohp' => $request->noHP,
                'alamat' => $request->alamat,
                'jeniskelamin' => $request->kelamin,
            ]);

            $trans = Transaksi::create([
                'muzakki_id' => $Muzakki->id,
                'user_id' => Auth::user()->id,
                'jeniszakat_id' => $request->tipe,
                'jiwa' => $request->jiwa,
                'beras_fitrah' => $request->beras,
                'uang_fitrah' => $request->uang,
                'fidyah' => $request->fidyah,
                'zakat_maal' => $request->maal,
                'infaq' => $request->infaq,
            ]);
        } elseif($request->cek == "old") {
            $idmuzakki = base64_decode($request->idm);
            $Muzakki = Muzakki::findOrfail($idmuzakki);
            $Muzakki->name = $request->nama;
            $Muzakki->email = $request->email;
            $Muzakki->nohp = $request->noHP;
            $Muzakki->alamat = $request->alamat;
            $Muzakki->jeniskelamin = $request->kelamin;
            $Muzakki->save();

            $trans = Transaksi::create([
                'muzakki_id' => $idmuzakki,
                'user_id' => Auth::user()->id,
                'jeniszakat_id' => $request->tipe,
                'jiwa' => $request->jiwa,
                'beras_fitrah' => $request->beras,
                'uang_fitrah' => $request->uang,
                'fidyah' => $request->fidyah,
                'zakat_maal' => $request->maal,
                'infaq' => $request->infaq,
            ]);
        }
        $idtrans = base64_encode($trans->id);
        return redirect('konfirmasi/'.$idtrans);
    }

    public function showInsertedZakat(Request $resuest, $id){
        $idTransaksi = base64_decode($id);
        $transaksi = Transaksi::findOrfail($idTransaksi);

        return view('konfirmasi-zakat', compact('transaksi'));
    }
}
