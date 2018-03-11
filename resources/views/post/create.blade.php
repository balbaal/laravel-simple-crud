@extends('layouts.app')

@section('content')
	<div class="container">
		<form action="{{ route('post.store') }}" method="post">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" placeholder="Post Title" class="form-control" id="title">
			</div>

			<div class="form-group">
				<label for="category">Category</label>
				<select class="form-control" name="category" id="category">
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" id="content" name="content" placeholder="Post Content" rows="10" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<input type="submit" value="submit" class="btn btn-primary">
			</div>
		</form>
	</div>	
@endsection	