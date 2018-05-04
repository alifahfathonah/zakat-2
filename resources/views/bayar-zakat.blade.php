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
                    	<form class="form-vertical" action="inputzakat.php" method="POST">
                    	<h2 class="card-inside-title">DATA MUZAKKI</h2>

                    		<div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="text" name="nama" id="nm" class="form-control" required="" autofocus="">
                    				<label class="form-label">Nama Muzakki</label>
                    			</div>
                    		</div>
                    		<div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="email" id="tp" name="email" class="form-control">
                    				<label class="form-label">E-Mail</label>
                    			</div>
                    		</div>
                    		<div class="form-group form-float">
                    			<div class="form-line">
                    				<textarea name="alamat" id="al" rows="4" cols="30" class="form-control no-resize" required=""></textarea>
                    				<label class="form-label">Alamat</label>
                    			</div>
                    		</div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="tp" name="noHP" class="form-control" onkeypress="return isNumberKey(event)" maxlength="16">
                                    <label class="form-label">Nomor Handphone</label>
                                </div>
                            </div>
                    		<div class="form-group form-float">
                    			<input type="radio" name="kelamin" id="laki-laki" class="with-gap" value="L" required="">
                    			<label class="form-label" for="laki-laki">Laki-laki</label>

                    			<input type="radio" name="kelamin" id="perempuan" class="with-gap" value="P">
                    			<label class="form-label" for="perempuan">Perempuan</label>
                    		</div>
                    		<h2 class="card-inside-title">DATA ZAKAT</h2>
                            <div class="form-group form-float">
                                <div>
                                    <select name="tipe" id="tipe" required="" class="select"> 
                                        @foreach($jenis_zakats as $jenis)
                                            <option value="{{ $jenis->id }}">{{ $jenis->jenis }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    		<div class="input-group">
                                <div class="form-line">
                                    <input type="text" required="" name="jiwa" id="jiwa" class="form-control" placeholder="Jumlah Jiwa" onkeypress="return isNumberKey(event)">
                                </div>
                                <span class="input-group-addon">Jiwa</span>
                            </div>
                    		<div class="input-group">
                                <div class="form-line">
                                    <input type="text" id="beras" name="beras" class="form-control" placeholder="Jumlah Beras" onkeypress="return isDecimalKey(event)" onfocus="totalBeras()">
                                </div>
                                <span class="input-group-addon">Liter</span>
                    		</div>
                    		<div class="input-group">
                    			<span class="input-group-addon">Rp</span>
                    			<div class="form-line">
                    				<input type="text" name="uang" id="uang" class="form-control" placeholder="Jumlah Zakat Fitrah Uang" onkeypress="return isNumberKey(event)" onfocus="totalUang()">
                    			</div>
                    		</div>
                    		<div class="input-group">
                    			<span class="input-group-addon">Rp</span>
                    			<div class="form-line">
                    				<input type="text" name="fidyah" class="form-control" placeholder="Jumlah Fidyah" onkeypress="return isNumberKey(event)">
                    			</div>
                    		</div>
                    		<div class="input-group">
                    			<span class="input-group-addon">Rp</span>
                    			<div class="form-line">
                    				<input type="text" name="maal" class="form-control" placeholder="Jumlah Zakat Maal" onkeypress="return isNumberKey(event)">
                    			</div>
                    		</div>
                    		<div class="input-group">
                    			<span class="input-group-addon">Rp</span>
                    			<div class="form-line">
                    				<input type="text" name="infaq" class="form-control" placeholder="Jumlah Infaq" onkeypress="return isNumberKey(event)">
                    			</div>
                    		</div>
                    		<div class="row clearfix">
                                <div class="">
                                <input type="submit" name="insert" value="MASUKKAN" class="btn btn-primary m-t-15 waves-effect" onclick="confirm('Apakah data yang diisi sudah benar?');">
                                <input type="reset" class="btn btn-primary m-t-15 waves-effect" value="RESET">
                                </div>
                            </div>
                    	</form>
                    </div>
        		</div>
        	</div>
        </div>
@endsection