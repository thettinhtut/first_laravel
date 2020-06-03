@extends("publicviews.publiclayout")
@section("content")
       
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="card mb-4 shadow-sm">
           
            <div class="card-body">
              <h3>{{$receipes->name}}</h3>
              <p class="card-text">Ingredients-{{$receipes->ingredients}}</p>
              <p>Category-{{$receipes->categories->name}}</p>
              <p>Description-{{$receipes->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="/"><button type="button" class="btn btn-sm btn-outline-secondary">Back</button></a>
              </div>
              </div>
                  
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection


        
           

  

