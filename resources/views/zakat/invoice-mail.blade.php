<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Kwitansi Untuk {{$transaksi->muzakki->name}}</title>
    <link rel="stylesheet" href="{{ asset('theme/css/template.css')}}" media="all" />
  </head>
    @php
        $val = array($transaksi->uang_fitrah,$transaksi->fidyah,$transaksi->zakat_maal,$transaksi->infaq);
        $data = array_sum($val);
    @endphp
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('logo.png')}}">
      </div>
      <div id="company">
        <h2 class="name">{{ config('app.name', 'Laravel') }}</h2>
        <div>Jl. Al - Mustaqim no. 20 Jak-Sel 12790, DKI Jakarta</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:remajaprisma@gmail.com">remajaprisma@gmail.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{$transaksi->muzakki->name}}</h2>
          <div class="address">{{$transaksi->muzakki->alamat}}</div>
          <div class="email"><a href="mailto:{{$transaksi->muzakki->email}}">{{$transaksi->muzakki->email}}</a></div>
        </div>
        <div id="invoice">
          <h1>INVOICE-00{{$transaksi->id}}</h1>
          <div class="date">Jakarta, {{\UserAgent::tanggalIndo(date('Y-m-d', strtotime($transaksi->created_at)))}}</div>
          {{--  <div class="date">Due Date: 30/06/2014</div>  --}}
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="desc">ITEM</th>
            <th class="total">JUMLAH</th>
          </tr>
        </thead>
        <tbody>
        @isset($transaksi->jiwa)
          <tr>
            <td class="desc"><h3>Jiwa</h3></td>
            <td class="total">{{$transaksi->jiwa}}</td>
          </tr>
        @endisset

        @isset($transaksi->beras_fitrah)
          <tr>
            <td class="desc"><h3>Zakat Fitrah Beras</h3></td>
            <td class="total">{{$transaksi->beras_fitrah}} Liter</td>
          </tr>
        @endisset

        @isset($transaksi->uang_fitrah)
          <tr>
            <td class="desc"><h3>Zakat Fitrah Uang</h3></td>
            <td class="total">Rp. {{number_format($transaksi->uang_fitrah,0,'',',')}}</td>
          </tr>
        @endisset

        @isset($transaksi->fidyah)
          <tr>
            <td class="desc"><h3>Fidyah</h3></td>
            <td class="total">Rp. {{number_format($transaksi->fidyah,0,'',',')}}</td>
          </tr>
        @endisset

        @isset($transaksi->zakat_maal)
          <tr>
            <td class="desc"><h3>Zakat Maal</h3></td>
            <td class="total">Rp. {{number_format($transaksi->zakat_maal,0,'',',')}}</td>
          </tr>
        @endisset

        @isset($transaksi->infaq)
          <tr>
            <td class="desc"><h3>Infaq</h3></td>
            <td class="total">Rp. {{number_format($transaksi->infaq,0,'',',')}}</td>
          </tr>
        @endisset
        </tbody>
        <tfoot>
        @if($data > 0)
          <tr>
            <td>GRAND TOTAL</td>
            <td>Rp. {{number_format($data,0,'',',')}}</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        @endif
        </tfoot>
      </table>
      <div id="thanks">Terima Kasih!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Invoice dibuat di server dan valid walau tanpa tanda tangan.</div>
      </div>
    </main>
    <footer>
      PRISMA {{date('Y')}}
    </footer>
  </body>
</html>