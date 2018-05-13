@extends('layouts.app')

@section('title', 'Data Zakat')
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
                                    PENERIMAAN ZAKAT
                                </h2>  
                            </div>
                            <div class="col-xs-12 col-sm-1 align-right">
                                <a title="Data Baru" class="btn bg-indigo btn-circle-lg waves-effect waves-circle waves-float col-xs-1" href="{{route('zakat.createOther')}}"><i class="material-icons">local_atm</i></a>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <form class="form-vertical" action="">
                            <div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="text" name="nama" id="nm" class="form-control" required="" autofocus="">
                    				<label class="form-label">Cari Muzakki</label>
                    			</div>
                    		</div>
                        </form>
                        <div class="table-responsive" id="table-hasil">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>ALAMAT</th>
                                        <th>NO HP</th>
                                        <th>PILIH</th>
                                    </tr>
                                </thead>
                                <tbody id="list-hasil">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
			</div>
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
                        </div>
        			</div>
                    <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="tbzakat">
                                <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>JIWA</th>
                                        <th>BERAS</th>
                                        <th>UANG</th>
                                        <th>FIDYAH</th>
                                        <th>ZAKAT MAAL</th>
                                        <th>INFAQ</th>
                                        <th>AMIL</th>
                                        <th>AKSI</th>
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
            jQuery(document).ready( function () {
                $('#table-hasil').hide();
                $('#tbzakat').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ url("list-transaksi") }}'
                    },
                    columns: [
                    {data: 'nama', name: 'muzakkis.name'},
                    {data: 'jiwa', name: 'jiwa'},
                    {data: 'beras_fitrah', name: 'beras_fitrah'},
                    {data: 'uang_zakat', name: 'uang_fitrah'},
                    {data: 'fidyah', name: 'fidyah'},
                    {data: 'maal', name: 'zakat_maal'},
                    {data: 'infaq', name: 'infaq'},
                    {data: 'name', name: 'users.name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                });
                $( "#nm" ).keyup(function() {
                    $('#table-hasil').show();
                    var nama = $( "#nm" ).val();
                    $.ajax({
						type:"GET",
						url:"{{url('search/muzakki')}}/"+nama+"",
						success: function(data) {
                            $('#list-hasil').html(data);
						}
					});
                });
                $("#tbzakat").on("click", "#hapus", function(){
                    swal({
                        title: 'Apakah Kamu Yakin Ingin Dihapus?',
                        text: "Hubungi Webmaster Untuk Mengembalikan Data Transaksi Yang Terhapus",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Saya Yakin',
                        cancelButtonText: 'Tidak, batalkan!',
                        }).then((result) => {
                        if (result.value) {
                            $('#myform').submit();
                        }
					})
                });
            } );
        </script>
@endsection