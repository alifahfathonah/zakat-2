<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
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
                ."<td>".$q->name."</td>"
                ."<td>".$q->alamat."</td>"
                ."<td>".$q->nohp."</td>"
                ."<td><a class'btn bg-indigo waves-effect' href='".$url."'><i class='material-icons'>launch</i></a></td>"
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

    public function getZakatData()
    {
        $zakats = DB::table('transaksis')->join('muzakkis', 'transaksis.muzakki_id', '=', 'muzakkis.id')
            ->join('users', 'transaksis.user_id', '=', 'users.id')
            ->join('jenis_zakats', 'transaksis.jeniszakat_id', '=', 'jenis_zakats.id')
            ->select(['muzakkis.name as nama', 'transaksis.jiwa', 'jenis_zakats.jenis', 'transaksis.beras_fitrah', 'transaksis.uang_fitrah', 'transaksis.fidyah', 'transaksis.zakat_maal', 'transaksis.infaq', 'users.name']);

        return Datatables::of($zakats)->make();
    }

    public function editZakat(Request $resuest, $id){
        $idTransaksi = base64_decode($id);
        $jenis_zakats = JenisZakat::all();
        $transaksi = Transaksi::findOrfail($idTransaksi);

        return view('edit-zakat', compact('transaksi','jenis_zakats'));
    }

    public function updateZakat(Transaksi $transaksi, Request $request){
        $transaksi->update([
            'jeniszakat_id' => request('tipe'),
            'jiwa' => request('jiwa'),
            'beras_fitrah' => request('beras'),
            'uang_fitrah' => request('uang'),
            'fidyah' =>request('fidyah'),
            'zakat_maal' => request('maal'),
            'infaq' => request('infaq'),
        ]);
        
        $muzakki = new \App\Muzakki;
        $Muzakki = Muzakki::findOrfail(base64_decode(request('_idm')));
        $Muzakki->name = request('nama');
        $Muzakki->email = request('email');
        $Muzakki->nohp = request('noHP');
        $Muzakki->alamat = request('alamat');
        $Muzakki->jeniskelamin = request('kelamin');
        $Muzakki->save();

        return redirect()->route('zakat.confirmation',base64_encode($transaksi->id));
    }
}
