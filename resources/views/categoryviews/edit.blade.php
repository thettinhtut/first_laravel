@extends("layouts.app")

@section("content")

  
<div class="container">
  <h2>Edit Category</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="/category/{{$category->id}}" method="POST">
    {{method_field("PATCH")}}
    {{csrf_field()}} 
      
    <div class="form-group">
    <label for="name">Category Name</label>
    <input type="text" name="name" class="form-control" value="{{$category->name}}" required >
    
    </div>
    <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" name="description" id="" value="{{$category->description}}" required>
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
</div>

@endsection