@extends("layouts.app")

@section("content")

	
<div class="container">
 	<h2>Add New Receipe</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="/receipe" method="POST">
  	{{csrf_field()}}
  	<div class="form-group">
      <label for="name">Receipe Name</label>
      <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
    
    </div>
    <div class="form-group">
      <label for="ingredients">Ingredients</label>
      <input type="text" class="form-control" name="ingredients" id="" value="{{old('ingredients')}}" required>
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" name="description" id="" value="{{old('description')}}" required>
    </div>

    <div class="form-group">
    <select class="form-control" name="category">
    @foreach($category as $value)
    <option value="{{$value->id}}">{{$value->name}}</option>
    @endforeach
     
   </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection

  
