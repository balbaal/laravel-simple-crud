@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-12">
	           	@foreach($posts as $post)
	           		<div class="card" style="margin-bottom: 20px;">
		                <div class="card-header" style="font-weight: bold">
		                		{{ $post->title }}
												<div class="float-right">
													<form class="" action="{{ route('post.destroy', $post->id) }}" method="post">
														{{ csrf_field() }}
														{{ method_field('DELETE') }}
														<button type="submit" class="btn btn-xs btn-danger" name="hapus">Delete</button>
													</form>
												</div>
												<a style="margin-right: 5px;" href="{{ route('post.edit', $post->id) }}" class="btn btn-xs btn-primary float-right">Edit</a>
		                </div>
		                <div class="card-body">
		                	<p>
		                		{{ $post->content }}
		                	</p>
											<hr>
											<a href="#">#{{ $post->name }}</a>
		                </div>
		            </div>
	           	@endforeach
	        </div>
	    </div>
	</div>
@endsection
