@extends('layouts.app')

@section('title',"Bayar Zakat")
@section('content')
<div class="block-header">
            <h2>BAYAR ZAKAT</h2>
        </div>
        <div class="row clearfix">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        		<div class="card">
        			<div class="header">
                        <h2>
                            MASUKKAN DATA
                        </h2>
                    </div>
                    <div class="body">
                    	<form class="form-vertical" id="myform" action="{{route('zakat.store')}}" method="POST">
                    	<h2 class="card-inside-title">DATA MUZAKKI</h2>
							@csrf
							@include('input-muzakki')
                    		<h2 class="card-inside-title">DATA ZAKAT</h2>
                            <div class="form-group form-float">
                                <div>
                                    <select name="tipe" id="tipe" required="" class="select">
										<option value="">-- pilih nominal zakat --</option> 
                                        @foreach($jenis_zakats as $jenis)
                                            <option value="{{ $jenis->id }}">{{ $jenis->jenis }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    		<div class="input-group">
                                <div class="form-line">
                                    <input type="text" required="" name="jiwa" id="jiwa" class="form-control only-num" placeholder="Jumlah Jiwa">
                                </div>
                                <span class="input-group-addon">Jiwa</span>
                            </div>
                    		<div class="input-group">
                                <div class="form-line">
                                    <input type="text" id="beras" name="beras" class="form-control dec-num" placeholder="Jumlah Beras">
                                </div>
                                <span class="input-group-addon">Liter</span>
                    		</div>
                    		<div class="input-group">
                    			<span class="input-group-addon">Rp</span>
                    			<div class="form-line">
                    				<input type="text" name="uang" id="uang" class="form-control only-num" placeholder="Jumlah Zakat Fitrah Uang">
                    			</div>
                    		</div>
                    		<div class="input-group">
                    			<span class="input-group-addon">Rp</span>
                    			<div class="form-line">
                    				<input type="text" name="fidyah" class="form-control only-num" placeholder="Jumlah Fidyah">
                    			</div>
                    		</div>
                    		<div class="input-group">
                    			<span class="input-group-addon">Rp</span>
                    			<div class="form-line">
                    				<input type="text" name="maal" class="form-control only-num" placeholder="Jumlah Zakat Maal">
                    			</div>
                    		</div>
                    		<div class="input-group">
                    			<span class="input-group-addon">Rp</span>
                    			<div class="form-line">
                    				<input type="text" name="infaq" class="form-control only-num" placeholder="Jumlah Infaq">
                    			</div>
                    		</div>
                    		<div class="row clearfix">
                                <div class="">
								{{--  <button type="button" class="btn btn-primary m-t-15 waves-effect" id="insert">MASUKKAN</button>  --}}
                                <input type="button" name="insert" id="insert" value="MASUKKAN" class="btn btn-primary m-t-15 waves-effect">
                                <input type="reset" class="btn btn-primary m-t-15 waves-effect" value="RESET">
                                </div>
                            </div>
                    	</form>
                    </div>
        		</div>
        	</div>
        </div>
<script>
	$(document).ready( function () {
			$( ".only-num" ).keypress(function(evt) {
				var charCode = (evt.which) ? evt.which : event.keyCode
				if (charCode > 31 && (charCode < 48 || charCode > 57))
					return false;
				return true;
			});
			$( ".dec-num" ).keypress(function(evt) {
				var charCode = (evt.which) ? evt.which : event.keyCode
				if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
					return false;
				return true;
			});
			$( "#beras" ).focus(function() {
				var jiwa = $( "#jiwa" ).val();
				var beras = 3.5;
				var res = jiwa*beras;
				$( "#beras" ).val(res);
			});
			$( "#uang" ).focus(function() {
				var jiwa = $( "#jiwa" ).val();
				var nominal = $("#tipe option:selected").val();
				if(nominal == "0"){
					$("#uang").val("0");
				} else {
					$.ajax({
						type:"GET",
						url:"{{url('nominal')}}/"+nominal+"",
						success: function(data) {
							var total = data.nominal*jiwa;
							$("#uang").val(total);
						}
					});
				}
			});
			$("#insert").click(function(){
				swal({
					title: 'Apakah Datanya Sudah Sesuai?',
					text: "Jika Data Tidak Sesuai, Anda Bisa Memodifikasinya di Halaman Edit",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, Sudah Sesuai',
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