@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Tạo lịch công tác mới
						</h1>
					</div>
					<div class="panel-body">
						<div class="row">
							<div id="data">
								<form>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<label>Nội dung:</label>
										<input type="text" class="form-control" id="tencongviec" name="content" />
									</div>
									<div class="form-group">
										<label>Thời gian:</label>
										<input type="time" name="time" id="gio" value="<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
echo date('H:i');
?>">
										<input type="date" id="ngay" name="date" value="<?php echo date('Y-m-d');?>">
									</div>
									<div class="form-group">
										<label>Người chủ trì:</label>
										<select  id = "profile_id">
											@foreach($user as $user)
											<optgroup label="{{$user->donvi->tenDonVi}} - {{$user->chucvu->tenChucVu}}">
												<option value="{{$user->id}}">
												{{$user->fullname}}</option>
											</optgroup>
											@endforeach
										</select>
									</div>
									<button id="save" class="btn btn-default">Lưu</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#save").click(function(){
			var content = $("#tencongviec").val();
			var gio = $("#gio").val();
			var ngay = $("#ngay").val();
			var profile_id = $("#profile_id").val();
			var url = "{{asset('tao-lich-cong-tac')}}";
			// alert(content+gio+ngay+url);
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url:url,
				type:"get",
				data: {'content':content,'gio':gio,'ngay':ngay,'profile_id':profile_id},
				async:true,
				success:function(data){
					alert(data);
				}
			})
			document.getElementById("tencongviec").value="";
			return false;
		});
	});
</script>
@endsection