<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Kwitansi Untuk {{$transaksi->muzakki->name}}</title>
    <style>
      @font-face {
        font-family: SourceSansPro;
        src: url(SourceSansPro-Regular.ttf);
      }

      .clearfix:after {
        content: "";
        display: table;
        clear: both;
      }

      a {
        color: #0087C3;
        text-decoration: none;
      }

      body {
        position: relative;
        width: 21cm;  
        height: 29.7cm; 
        margin: 0 auto; 
        color: #555555;
        background: #FFFFFF; 
        font-family: Arial, sans-serif; 
        font-size: 14px; 
        font-family: SourceSansPro;
      }

      header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #AAAAAA;
      }

      #logo {
        float: left;
        margin-top: 8px;
      }

      #logo img {
        height: 70px;
      }

      #company {
        float: right;
        text-align: right;
      }


      #details {
        margin-bottom: 50px;
      }

      #client {
        padding-left: 6px;
        border-left: 6px solid #0087C3;
        float: left;
      }

      #client .to {
        color: #777777;
      }

      h2.name {
        font-size: 1.4em;
        font-weight: normal;
        margin: 0;
      }

      #invoice {
        float: right;
        text-align: right;
      }

      #invoice h1 {
        color: #0087C3;
        font-size: 2.4em;
        line-height: 1em;
        font-weight: normal;
        margin: 0  0 10px 0;
      }

      #invoice .date {
        font-size: 1.1em;
        color: #777777;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
      }

      table th,
      table td {
        padding: 20px;
        background: #EEEEEE;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
      }

      table th {
        white-space: nowrap;        
        font-weight: normal;
      }

      table td {
        text-align: right;
      }

      table td h3{
        color: #57B223;
        font-size: 1.2em;
        font-weight: normal;
        margin: 0 0 0.2em 0;
      }

      table .no {
        color: #FFFFFF;
        font-size: 1.6em;
        background: #57B223;
      }

      table .desc {
        text-align: left;
      }

      table .unit {
        background: #DDDDDD;
      }

      table .qty {
      }

      table .total {
        background: #57B223;
        color: #FFFFFF;
      }

      table td.unit,
      table td.qty,
      table td.total {
        font-size: 1.2em;
      }

      table tbody tr:last-child td {
        border: none;
      }

      table tfoot td {
        padding: 10px 20px;
        background: #FFFFFF;
        border-bottom: none;
        font-size: 1.2em;
        white-space: nowrap; 
        border-top: 1px solid #AAAAAA; 
      }

      table tfoot tr:first-child td {
        border-top: none; 
      }

      table tfoot tr:last-child td {
        color: #57B223;
        font-size: 1.4em;
        border-top: 1px solid #57B223; 

      }

      table tfoot tr td:first-child {
        border: none;
      }

      #thanks{
        font-size: 2em;
        margin-bottom: 50px;
      }

      #notices{
        padding-left: 6px;
        border-left: 6px solid #0087C3;  
      }

      #notices .notice {
        font-size: 1.2em;
      }

      footer {
        color: #777777;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #AAAAAA;
        padding: 8px 0;
        text-align: center;
      }
    </style>
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