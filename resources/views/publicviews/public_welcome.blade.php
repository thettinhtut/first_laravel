@extends("publicviews.publiclayout")
@section("content")
       
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      @foreach($receipes as $receipe)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
           
            <div class="card-body">
              <h3>{{$receipe->name}}</h3>
              <p class="card-text">{{$receipe->categories->name}}</p>
              <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="detail/{{$receipe->id}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
              </div>
              </div>
                  
            </div>
          </div>
        </div>
      @endforeach
    </div>
    {{ $receipes->links() }}
  </div>
</div>
@endsection


        
           

  

