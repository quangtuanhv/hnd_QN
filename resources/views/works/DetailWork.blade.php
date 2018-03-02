@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					<small>{{$work->title}}</small>
				</h1>
			</div>
			{!!$work->content!!}
		{{-- 	<p>File đính kèm: </p>
			<a href="{{route('download',$news->file)}}">xem </a> --}}
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
@endsection
