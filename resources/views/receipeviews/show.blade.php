@extends("layouts.app")

@section("content")


<div class="container">
	<div class="card">
	<img src="{{'/storage/images/'.$receipe->image}}" class="card-img-top">
	<h1 class="card-title">{{$receipe->name}}</h1>
	<li class="card-text">Ingredients-{{$receipe->ingredients}}</li>
	<li class="card-text">Category-{{$receipe->categories->name}}</li>
	<li class="card-text">Description-{{$receipe->description}}</li>
	<hr>
	<div class="card-footer">
		<a href="/receipe/{{$receipe->id}}/edit"><button class="btn btn-success">Edit</button></a>

	<form method="POST" action="/receipe/{{$receipe->id}}">
		{{method_field("DELETE")}}
		{{csrf_field()}}
		<button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-primary">Delete</button>
	</form>
	</div>
	</div>
</div>
@endsection