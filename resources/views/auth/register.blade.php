@extends('layouts.app')

@section('content')

<div style="margin-bottom:10px"></div>

<!-- login-area start -->
<div class="login-area mb-50">
    <div class="container">
        <div class="row">
			<div class="col-md-3 col-sm-3">&nbsp;</div>
            <div class="col-md-6 col-sm-6" style="background-color:#ffffff;padding:30px 30px 0 30px; border:solid 1px #2F88CC">
				<h2 style="font-size:16px;margin-bottom:30px"><strong>Daftar</strong></h2>

				<form action="/register" method="POST">
					{!! csrf_field() !!}

	                <div class="billing-fields row">
						<p class="col-md-12">
							<i><span style="color:red">*</span>Lengkapi semua isian di bawah ini</i>
						</p>
	                    <p class="col-sm-12">
	                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Nama Lengkap">
	                    </p>
	                    <p class="col-sm-12">
	                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
	                    </p>
	                    <p class="col-sm-12">
	                        <input type="password" value="" placeholder="Password" id="password" name="password" class="form-control">
	                    </p>
	                    <p class="col-sm-12" >
	                        <input type="password" value="" placeholder="Konfirmasi Password" id="passwordConfirmation" name="passwordConfirmation" class="form-control">
	                    </p>

						<p class="col-md-12" style="font-size:12px">
							Dengan mengklik tombol Registrasi, Anda setuju dengan <a href="/pages/policy">Privacy Policy</a> dan <a href="/pages/term-conditions">Terms & Conditions</a>
						</p>

	                    <p class="col-sm-12">
	                        <button type="submit" value="Register" name="signup" class="btn btn-primary form-control">REGISTRASI AKUN ANDA</button>
	                    </p>

						<p class="col-md-12">
							Sudah memiliki akun? <a href="/login">Sign In</a>
						</p>
	                </div>
				</form>
            </div>

			<div class="col-md-3 col-sm-3">&nbsp;</div>
            <!-- /.col-md-6 -->
            <div class="col-md-6 marTB30"></div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
</div>
<!-- login-area end -->

@endsection
