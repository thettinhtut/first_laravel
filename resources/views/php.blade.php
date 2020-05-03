@extends("layout")
@section('title')
php page
@endsection
@section("content")
<h2>php page</h2>
  
 @foreach($data as $value)
 	<li>{{$value}}</li>
 @endforeach

@endsection