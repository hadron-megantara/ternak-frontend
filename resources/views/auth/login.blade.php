@extends('layouts.app')

@section('content')

<div style="margin-bottom:10px"></div>

<!-- login-area start -->
<div class="login-area mb-50">
    <div class="container">
        <div class="row">
			<div class="col-md-3 col-sm-3">&nbsp;</div>
            <div class="col-md-6 col-sm-6" style="background-color:#ffffff;padding:30px 0 0 30px;border:solid 1px #2F88CC">
				<h2 style="font-size:22px;margin-bottom:30px;color:#2F88CC;font-weight:bold"><strong>Masuk</strong></h2>

                @if(isset($checkout))
                    <div class="alert alert-warning text-center">
                        {{$checkout['message']}}
                    </div>
                @endif

				<form action="/login" method="POST">
					{!! csrf_field() !!}

	                <div class="billing-fields row">
	                    <p class="col-sm-12">
	                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
	                    </p>

	                    <p class="col-sm-12">
							<label for="password" style="color:#4FC1F0;font-size:14px"><a href="/password/reset">Lupa Password?</a></label>
	                        <input type="password" value="" placeholder="Password" id="password" name="password" class="form-control">
	                    </p>

						<p class="col-sm-12">

	                    </p>

	                    <p class="col-sm-12">
	                        <button type="submit" value="Register" name="signup" class="btn btn-primary form-control">Masuk ke Ternakin</button>
	                    </p>

						<p class="col-md-12">
							Belum memiliki akun? <a href="/register">Daftar Sekarang</a>
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
