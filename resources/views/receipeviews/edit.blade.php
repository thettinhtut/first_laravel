@extends("layouts.app")

@section("content")

	
<div class="container">
 	<h2>Edit Receipe</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="/receipe/{{$receipe->id}}" method="POST" enctype="multipart/form-data">
    {{method_field("PATCH")}}
  	{{csrf_field()}} 
      
  	<div class="form-group">
    <label for="Name">Receipe Name</label>
    <input type="text" name="name" class="form-control" value="{{$receipe->name}}" required >
    
    </div>
    <div class="form-group">
    <label for="Ingredients">Ingredients</label>
    <input type="text" class="form-control" name="ingredients" id="" value="{{$receipe->ingredients}}" required>
    </div>

    <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" name="description" id="" value="{{$receipe->description}}" required>
    </div>

    <div class="form-group">
    <select class="form-control" name="category">
    @foreach($category as $value)
    <option value="{{$value->id}}" {{$receipe->categories->id == $value->id ? 
    "selected" : ""}}>{{$value->name}}</option>
    @endforeach
     
    </select>
    </div>

    <div class="form-group">
    <label for="rimage">Receipe Image</label>
    <input type="file"  name="rimage" value="{{'/storage/images/'.$receipe->image}}"><br>
    <img src="{{'/storage/images/'.$receipe->image}}" width="150" height="150">
    </div>

    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
</div>

@endsection