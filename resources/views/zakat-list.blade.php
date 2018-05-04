@extends('layouts.app')

@section('content')
<div class="block-header">
            <h2>DAFTAR ZAKAT</h2>
        </div>
        <div class="row clearfix">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        		<div class="card">
        			<div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-11">
                                <h2>
                                    DATA ZAKAT YANG SUDAH DITERIMA
                                </h2>  
                            </div>
                            <div class="col-xs-12 col-sm-1 align-right">
                                <a title="Bayar Zakat" class="btn btn-success btn-circle-lg waves-effect waves-circle waves-float col-xs-1" href="{{route('zakat.create')}}"><i class="material-icons">local_atm</i></a>
                            </div>
                        </div>
        			</div>
                    <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="tbzakat">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>NAMA</th>
                                        <th>JIWA</th>
                                        <th>BERAS</th>
                                        <th>UANG</th>
                                        <th>FIDYAH</th>
                                        <th>ZAKAT MAAL</th>
                                        <th>INFAQ</th>
                                        <th>AMIL</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                    </div>
        		</div>
        	</div>
        </div>
        <script>
            $(document).ready( function () {
                $('#tbzakat').DataTable({
                    responsive: true,
                });
            } );
        </script>
@endsection