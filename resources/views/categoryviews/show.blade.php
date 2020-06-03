@extends("layouts.app")

@section("content")


<div class="container">
    <h1>{{$category->name}}</h1>
    <li>Description-{{$category->description}}</li>
    <hr>
    <a href="/category/{{$category->id}}/edit"><button class="btn btn-success">Edit</button></a>

    <form method="POST" action="/category/{{$category->id}}">
        {{method_field("DELETE")}}
        {{csrf_field()}}
        <button type="submit" class="btn btn-primary">Delete</button>
    </form>
</div>
@endsection