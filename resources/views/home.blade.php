@extends('layouts.app')

@section('title',"Manajemen Zakat")
@section('content')
@php
    $val = array($report->Uang,$report->Maal,$report->Fidyah,$report->Infaq);
    $data = array_sum($val);
@endphp
<div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">group</i>
            </div>
            <div class="content">
                <div class="text">JUMLAH MUZAKKI</div>
                    <p><span class="number count-to" data-from="0" data-to="{{$report->Jiwa}}" data-speed="1000" data-fresh-interval="20"></span> Orang</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-indigo hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">monetization_on</i>
                </div>
                <div class="content">
                    <div class="text">JUMLAH ZAKAT UANG</div>
                    <p><span class="sales-count-to number count-to" data-to="{{$report->Uang}}" data-speed="1000" data-fresh-interval="20"></span></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">invert_colors</i>
                </div>
                <div class="content">
                    <div class="text">JUMLAH ZAKAT BERAS</div>
                    <p><span class="number count-to" data-from="0" data-to="{{$report->Beras}}" data-decimals="1" data-speed="1000" data-fresh-interval="20"></span> Liter</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-indigo hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">local_grocery_store</i>
                </div>
                <div class="content">
                    <div class="text">JUMLAH FIDYAH</div>
                    <p><span class="sales-count-to number count-to" data-from="0" data-to="{{$report->Fidyah}}" data-speed="1000" data-fresh-interval="20"></span></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">shop</i>
                </div>
                <div class="content">
                    <div class="text">JUMLAH ZAKAT MAAL</div>
                    <p><span class="sales-count-to number count-to" data-from="0" data-to="{{$report->Maal}}" data-speed="1000" data-fresh-interval="20"></span></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-indigo hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">local_atm</i>
                </div>
                <div class="content">
                    <div class="text">JUMLAH INFAQ</div>
                    <p><span class="sales-count-to number count-to" data-from="0" data-to="{{$report->Infaq}}" data-speed="1000" data-fresh-interval="20"></span></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4"></div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="info-box bg-indigo hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">work</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL UANG MASUK</div>
                    <p><span class="sales-count-to number count-to" data-from="0" data-to="{{$data}}" data-speed="1000" data-fresh-interval="20"></span></p>
                </div>
            </div>
         </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<div class="card">
                <div class="body">
                    <div id="charts" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
        	</div>
        </div>
    </div>
{{--  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>  --}}
    <script>
            Highcharts.chart('charts', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Jenis Zakat Paling Diminati Tahun '+{{date('Y')}}+''
                },
                subtitle: {
                    text: 'Sumber: LAZISMA'
                },
                xAxis: {
                    categories: [
                        'Rp. {{$jenis[0]->jenis}}',
                        'Rp. {{$jenis[1]->jenis}}',
                        'Rp. {{$jenis[2]->jenis}}',
                        'Rp. {{$jenis[3]->jenis}}',
                        'Beras'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ''
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Jumlah',
                    data: [{{$jenispopuler->jenis1}}, {{$jenispopuler->jenis2}}, {{$jenispopuler->jenis3}}, {{$jenispopuler->jenis4}}, {{$jenispopuler->beras}}]

                }]
            });
    </script>
@endsection
