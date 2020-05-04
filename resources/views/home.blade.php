@extends("layout")

@section("content")
<h1>home page</h1>
@foreach($data as $value)
<li>{{$value->name}}</li>
<li>{{$value->ingredients}}</li>
<li>{{$value->category}}</li>
<hr>
@endforeach

@endsection