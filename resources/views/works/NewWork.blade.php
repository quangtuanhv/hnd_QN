@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Tạo công việc mới
						</h1>
					</div>
					<div class="panel-body">
						<div class="row">
							<div id="data">
								<form action="{{route('postCV',Auth::id())}}" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<label>Tiêu đề:</label>
										<input type="text" class="form-control" name="title"
										/>
									</div>
									<div class="form-group">
										<label>Nội dung:</label>
										<textarea name="content" class="form-control " id="editor1"></textarea>
									</div>
									<div class="form-group">
										<label>Đính kèm tệp:</label>
										<input id="ckfinder-input-1" name="file" type="text" class="form-control" >
										<br>
										<input type="button" value="Chọn tệp đính kèm" id="ckfinder-popup-1" class="button-a button-a-background">

									</div>
									<div class="form-group">

									</div>
									<div class="form-group">
										<label>Ngày nhận:</label>
										<input type="date" name="receive" id="day_1" value="<?php echo date('Y-m-d');?>">
									</div>
									<div class="form-group">
										<label>Ngày hết hạn:</label>
										<input type="date" name="deadline" id="day_2" value="<?php echo date('Y-m-d');?>" onchange="CheckDay()">
									</div>
									<div class="form-group">
										<label>Nơi nhận việc:</label>

										<select  name = "user_id_receive">
											@foreach($user as $user)
											<optgroup label="{{$user->donvi->tenDonVi}} - {{$user->chucvu->tenChucVu}}">
												<option value="{{$user->id}}">
												{{$user->fullname}}</option>
											</optgroup>
											@endforeach
										</select>

									</div>
									<button id="myBtn" type="submit" class="btn btn-success">Giao việc</button>
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
// xử lý ngày nhận phải lớn hơn ngày giao
</script>

<script type="text/javascript">
	var button1 = document.getElementById( 'ckfinder-popup-1' );

	button1.onclick = function() {
		selectFileWithCKFinder( 'ckfinder-input-1' );
	};

	function selectFileWithCKFinder( elementId ) {
		CKFinder.modal( {
			chooseFiles: true,
			width: 800,
			height: 600,
			onInit: function( finder ) {
				finder.on( 'files:choose', function( evt ) {
					var file = evt.data.files.first();
					var output = document.getElementById( elementId );
					output.value = file.getUrl();
				} );

				finder.on( 'file:choose:resizedImage', function( evt ) {
					var output = document.getElementById( elementId );
					output.value = evt.data.resizedUrl;
				} );
			}
		} );
	}
</script>
@endsection