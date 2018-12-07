@extends('layouts.app')

@section('content')

<!-- login-area start -->
<div class="login-area mb-50" style="margin-top:-20px">
    <div class="container">
		<div class="row">
			<div class="col-md-12 row" style="padding:20px;margin-top:20px;height:100%">
                <div class="col-md-5" style="background-color:#ffffff;padding:20px;">
                    <label><strong style="font-size:18px">Informasi Akun</strong></label>

    				<div class="row" style="margin-top:10px">
    					<label for="inputEmail" class="col-md-4"><span class="pull-right" style="margin-top:12px">Email</span></label>

    					<div class="col-md-8">
    						<input class="form-control" id="inputEmail" type="email" value="{{$user['email']}}" disabled />
    					</div>
    				</div>

    				<div class="row" style="margin-top:20px;margin-bottom:20px">
    					<label for="inputPassword" class="col-md-4"><span class="pull-right" style="margin-top:12px">Password</span></label>

    					<div class="col-md-4">
    						<input class="form-control" id="inputPassword" type="password" value="********" disabled />
    					</div>

    					<div class="col-md-4" style="margin-top:7px">
    						<a href="/profile/change-password" class="btn-sm btn-success form-control"><span class="fa fa-key"></span> Ubah Password</a>
    					</div>
    				</div>
                </div>

                <div class="col-md-2">&nbsp;</div>

                <div class="col-md-5" style="background-color:#ffffff;padding:20px;height:100%">
    				<label><strong style="font-size:18px;">Informasi Profil</strong></label>

    				<div class="row" style="margin-bottom:20px;margin-top:10px">
    					<label for="inputPhone" class="col-md-4"><span class="pull-right" style="margin-top:12px">No HP/Telepon</span></label>

    					<div class="col-md-8">
    						<input class="form-control" id="inputPhone" type="text" value="{{$user['phone']}}" />
    					</div>
    				</div>
                </div>
			</div>

			<div class="col-md-12 row" style="padding:20px;margin-top:-20px">
                <div class="col-md-12" style="background-color:#ffffff;padding:20px;">
    				<label><strong style="font-size:18px">Informasi Alamat</strong></label>

                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            {{session('success')}}
                        </div>
                    @endif

    				<div class="row" style="margin-bottom:20px">
    					<div class="col-md-12">
                            <a href="#addModal" id="btnAddAddressArea" class="btn-sm btn-success pull-right" data-toggle="modal">
                                <span class="fa fa-plus"></span> Tambah Alamat
                            </a>
    					</div>
    				</div>

    				<div class="row" style="margin-bottom:20px">
    					<div class="col-md-12">
    						@if(isset($address) && $address->total > 0)
                                <table style="width: 100%">
                                    <tr style="border-bottom:solid 1px;font-size:16px">
                                        <th style="width:25%; padding-bottom:10px">Penerima</th>
                                        <th style="width:30%;padding-bottom:10px">Alamat Pengiriman</th>
                                        <th style="width:30%;padding-bottom:10px">Daerah Pengiriman</th>
                                        <th style="width:15%;padding-bottom:10px">Aksi</th>
                                    </tr>

                                    @foreach($address->data as $addressData)
                                        <tr>
                                            <td>
                                                <strong>{{$addressData->RecipientName}}</strong> <br/>
                                                {{$addressData->RecipientPhone}}
                                            </td>

                                            <td>
                                                <strong>{{$addressData->Name}}</strong> <br/>
                                                {{$addressData->Address}}
                                            </td>

                                            <td style="padding-top:10px">
                                                {{$addressData->Province}}, {{$addressData->City}}, <br/>
                                                {{$addressData->District}} @if($addressData->PostCode != null) {{$addressData->PostCode}} @endif <br/>
                                                Indonesia
                                            </td>

                                            <td>
                                                <a href="#editModal" class="btn-sm btn-primary" data-toggle="modal"><span class="fa fa-pencil"></span> Ubah</a>
                                                <a href="#deleteModal" class="btn-sm btn-danger" data-toggle="modal"><span class="fa fa-trash"></span> Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
    						@else
    							<span>Belum ada alamat yang terdaftar</span>
    						@endif
    					</div>
    				</div>
                </div>
			</div>
		</div>
	</div>
</div>

<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Alamat</h4>
            </div>

            <form action="/profile/address/add" method="POST">
                <div class="modal-body" style="margin-top:10px">
					{!! csrf_field() !!}

					<div class="row" style="margin-bottom:10px;">
                        <div class='col-md-1'>&nbsp;</div>
						<div class="col-md-10">
                            <span class="modal-input-text">Nama Alamat</span>
							<input type="text" class="form-control" name="addressName" id="addressName" placeholder="Nama Alamat (ex: Rumah/Kantor)" />
						</div>
                        <div class='col-md-1'>&nbsp;</div>
					</div>

                    <div class="row" style="margin-bottom:10px;">
                        <div class='col-md-1'>&nbsp;</div>
						<div class="col-md-5">
                            <span class="modal-input-text">Nama Penerima</span>
							<input type="text" class="form-control" name="addressRecipientName" id="addressRecipientName" />
						</div>
                        <div class="col-md-5">
                            <span class="modal-input-text">No HP/Telepon Penerima</span>
							<input type="text" class="form-control" name="addressRecipientPhone" id="addressRecipientPhone" />
						</div>
                        <div class='col-md-1'>&nbsp;</div>
					</div>

					<div class="row" style="margin-bottom:10px;">
                        <div class='col-md-1'>&nbsp;</div>
						<div class="col-md-10">
                            <span class="modal-input-text">Provinsi</span>
							<select class="form-control" id="inputProvince" name="provinceId">
								<option value="">--- Pilih Provinsi ---</option>
								@foreach($province as $provinceData)
									<option value="{{$provinceData->Id}}">{{$provinceData->Name}}</option>
								@endforeach
							</select>
						</div>
                        <div class='col-md-1'>&nbsp;</div>
					</div>

					<div class="row" style="margin-bottom:10px;">
                        <div class='col-md-1'>&nbsp;</div>
						<div class="col-md-10">
                            <span class="modal-input-text">Kota/Kabupaten</span>
							<select class="form-control" id="inputCity" name="cityId">
								<option value="">--- Pilih Kota/Kabupaten ---</option>
							</select>
						</div>
                        <div class='col-md-1'>&nbsp;</div>
					</div>

					<div class="row" style="margin-bottom:10px;">
                        <div class='col-md-1'>&nbsp;</div>
						<div class="col-md-10">
                            <span class="modal-input-text">Kecamatan</span>
							<select class="form-control" id="inputDistrict" name="districtId">
								<option value="">--- Pilih Kecamatan ---</option>
							</select>
						</div>
                        <div class='col-md-1'>&nbsp;</div>
					</div>

					<div class="row" style="margin-bottom:40px;">
                        <div class='col-md-1'>&nbsp;</div>
						<div class="col-md-10">
                            <span class="modal-input-text">Alamat</span>
							<textarea class="form-control" style="resize:none" rows="3" id="inputAddress" name="address" placeholder="Masukkan Alamat"></textarea>
						</div>
                        <div class='col-md-1'>&nbsp;</div>

                        <div class="row clear"></div>
                        <div class='col-md-1'>&nbsp;</div>
						<div class="col-md-10" style="margin-top:20px;">
							<div class="pull-right">
								<button type="button" data-dismiss="modal" id="btnHideAddAddressArea" class="btn btn-success" style="background-color:#ffffff;border:2px solid #317398;color:#317398;margin-right:10px">
									<span class="fa fa-close"></span> Batal
								</button>

								<button type="submit" class="btn btn-success" style="background-color:#317398">
									<span class="fa fa-save"></span> Simpan
								</button>
							</div>
						</div>
                        <div class='col-md-1'>&nbsp;</div>
					</div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Alamat</h4>
            </div>

            <form action="/profile/address/edit" method="POST">
                <div class="modal-body" style="margin-top:10px">
					{!! csrf_field() !!}

					<div class="row" style="margin-bottom:10px;">
                        <div class='col-md-1'>&nbsp;</div>
						<div class="col-md-10">
                            <span class="modal-input-text">Nama Alamat</span>
							<input type="text" class="form-control" name="addressName" id="addressName" placeholder="Nama Alamat (ex: Rumah/Kantor)" />
						</div>
                        <div class='col-md-1'>&nbsp;</div>
					</div>

                    <div class="row" style="margin-bottom:10px;">
                        <div class='col-md-1'>&nbsp;</div>
						<div class="col-md-5">
                            <span class="modal-input-text">Nama Penerima</span>
							<input type="text" class="form-control" name="addressRecipientName" id="addressRecipientName" />
						</div>
                        <div class="col-md-5">
                            <span class="modal-input-text">No HP/Telepon Penerima</span>
							<input type="text" class="form-control" name="addressRecipientPhone" id="addressRecipientPhone" />
						</div>
                        <div class='col-md-1'>&nbsp;</div>
					</div>

					<div class="row" style="margin-bottom:10px;">
                        <div class='col-md-1'>&nbsp;</div>
						<div class="col-md-10">
                            <span class="modal-input-text">Provinsi</span>
							<select class="form-control" id="inputProvince" name="provinceId">
								<option value="">--- Pilih Provinsi ---</option>
								@foreach($province as $provinceData)
									<option value="{{$provinceData->Id}}">{{$provinceData->Name}}</option>
								@endforeach
							</select>
						</div>
                        <div class='col-md-1'>&nbsp;</div>
					</div>

					<div class="row" style="margin-bottom:10px;">
                        <div class='col-md-1'>&nbsp;</div>
						<div class="col-md-10">
                            <span class="modal-input-text">Kota/Kabupaten</span>
							<select class="form-control" id="inputCity" name="cityId">
								<option value="">--- Pilih Kota/Kabupaten ---</option>
							</select>
						</div>
                        <div class='col-md-1'>&nbsp;</div>
					</div>

					<div class="row" style="margin-bottom:10px;">
                        <div class='col-md-1'>&nbsp;</div>
						<div class="col-md-10">
                            <span class="modal-input-text">Kecamatan</span>
							<select class="form-control" id="inputDistrict" name="districtId">
								<option value="">--- Pilih Kecamatan ---</option>
							</select>
						</div>
                        <div class='col-md-1'>&nbsp;</div>
					</div>

					<div class="row" style="margin-bottom:40px;">
                        <div class='col-md-1'>&nbsp;</div>
						<div class="col-md-10">
                            <span class="modal-input-text">Alamat</span>
							<textarea class="form-control" style="resize:none" rows="3" id="inputAddress" name="address" placeholder="Masukkan Alamat"></textarea>
						</div>
                        <div class='col-md-1'>&nbsp;</div>

                        <div class="row clear"></div>
                        <div class='col-md-1'>&nbsp;</div>
						<div class="col-md-10" style="margin-top:20px;">
							<div class="pull-right">
								<button type="button" data-dismiss="modal" id="btnHideAddAddressArea" class="btn btn-success" style="background-color:#ffffff;border:2px solid #317398;color:#317398;margin-right:10px">
									<span class="fa fa-close"></span> Batal
								</button>

								<button type="submit" class="btn btn-success" style="background-color:#317398">
									<span class="fa fa-save"></span> Ubah
								</button>
							</div>
						</div>
                        <div class='col-md-1'>&nbsp;</div>
					</div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#inputProvince').change(function(){
			$.ajax({
				type: "get",
				url: "/config/city/get",
				data: {
					'provinceId': $(this).val(),
				},
				success: function(data) {
					$('#inputCity').html('<option value="">--- Pilih Kota/Kabupaten ---</option>');

					$.each(data, function(k, v) {
						$('#inputCity').append('<option value="'+v.Id+'">'+v.Name+'</option>');
					});
				}
			});
		});

		$('#inputCity').change(function(){
			$.ajax({
				type: "get",
				url: "/config/district/get",
				data: {
					'cityId': $(this).val(),
				},
				success: function(data) {
					$('#inputDistrict').html('<option value="">--- Pilih Kecamatan ---</option>');

					$.each(data, function(k, v) {
						$('#inputDistrict').append('<option value="'+v.Id+'">'+v.Name+'</option>');
					});
				}
			});
		});
	});
</script>

@endsection
