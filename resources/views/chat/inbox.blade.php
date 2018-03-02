@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Hộp thư đến
						</h1>
					</div>
					<div class="panel-body">
						<div class="row">
							<div id="data">
								<div class="chat_left">

									@foreach($mess as $mess)
									<a href="#">{{$mess->profile->fullname}}</a>
									<br>
									{{$mess->content}}
									<hr>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection