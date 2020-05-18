@extends("layout")

@section("content")


<div class="container">
	<h1>{{$receipe->name}}</h1>
	<li>{{$receipe->ingredients}}</li>
<li>{{$receipe->categories->name}}</li>
<hr>
<a href="/receipe/{{$receipe->id}}/edit"><button class="btn btn-success">Edit</button></a>

<form method="POST" action="/receipe/{{$receipe->id}}">
	{{method_field("DELETE")}}
	{{csrf_field()}}
	<button type="submit" class="btn btn-primary">Delete</button>
</form>


</div>


@endsection