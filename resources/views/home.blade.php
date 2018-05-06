@extends('layouts.app')

@section('title',"Manajemen Zakat")
@section('content')
<div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">group</i>
            </div>
            <div class="content">
                <div class="text">JUMLAH MUZAKKI</div>
                    <p><span class="number count-to" data-from="0" data-to="12" data-speed="1000" data-fresh-interval="20"></span> Orang</p>
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
                    <p>Rp. <span class="money number count-to" id="uang" data-from="0" data-to="250000" data-speed="1000" data-fresh-interval="20"></span></p>
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
                    <p><span class="number count-to" data-from="0" data-to="50.5" data-decimals="1" data-speed="1000" data-fresh-interval="20"></span> Liter</p>
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
                    <p>Rp. <span class="number count-to" data-from="0" data-to="50000" data-speed="1000" data-fresh-interval="20"></span></p>
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
                    <p>Rp. <span class="number count-to" data-from="0" data-to="80000" data-speed="1000" data-fresh-interval="20"></span></p>
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
                    <p>Rp. <span class="number count-to" data-from="0" data-to="70000" data-speed="1000" data-fresh-interval="20"></span></p>
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
                    <div class="text">JUMLAH UANG MASUK</div>
                    <p>Rp. <span class="number count-to" data-from="0" data-to="500000" data-speed="1000" data-fresh-interval="20"></span></p>
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
    $(document).ready(function(){
        $('.money').data('countToOptions', {
            formatter: function(value, options) {
            return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });
    });
</script>
@endsection
