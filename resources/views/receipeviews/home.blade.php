@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
   <div class="col-md-8">
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
          <div class="container">

            <h1>Receipe Home Page</h1>

            @if ($message = Session::get('message'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
            @endif
              
            <a href="/receipe/create"><button class="btn btn-success">Create</button></a>
             @foreach($data as $value)
                <a href="receipe/{{$value->id}}"><li>{{$value->name}}</li></a>

                <hr>
             @endforeach
        </div>
        {{$data->links()}}
    </div>
   </div>
  </div>
</div>
@endsection
            
                

            



