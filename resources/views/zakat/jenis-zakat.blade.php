@extends('layouts.app')

@section('title', 'Jenis Zakat')
@section('content')
<div class="block-header">
            <h2>PROFIL PENGGUNA</h2>
        </div>
        <div class="row clearfix">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        		<div class="card">
        			<div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-11">
                                <h2>
                                    GANTI PASSWORD
                                </h2>  
                            </div>
                        </div>
        			</div>
                    <div class="body">
                        <form action="{{route('jeniszakat.store',Auth::user()->id)}}" method="post" id="profil">
                            @csrf
                            @for ($i = 1; $i < 5; $i++)
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="jenis{{{ $i }}}" class="form-control" placeholder="jenis">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nominal{{ $i }}" class="form-control" placeholder="Nominal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                            <div class="row clearfix">
                                <div class="">
                                <input type="button" name="insert" id="insert" value="MASUKKAN" class="btn btn-primary m-t-15 waves-effect">
                                </div>
                            </div>
                        </form>
                    </div>
        		</div>
        	</div>
        </div>
        <script>
                $(document).ready(function(){
                    $("#insert").click(function(){
                        swal({
                            title: 'Apakah Password Sudah Benar?',
                            text: "Periksa Terlebih Dahulu Password Anda!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, Sudah Benar',
                            cancelButtonText: 'Tidak, batalkan!',
                            }).then((result) => {
                            if (result.value) {
                                $('#profil').submit();
                            }
                            })
                    });
                });
        </script>
@endsection