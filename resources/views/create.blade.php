@extends('master.layout')
@section('title')
  Publier
@endsection
@section('style')
  <style>
    body
    {
      background-color: #ddd;
    }
  </style>
@endsection
@section('content')

<div class="row my-12">
    <div class="col-md-12" mx-auto>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
             <div class="card">
                <div class="card-header">
                   <h3 class="card-title">
                                Poster une Publication 
                    </h3>
                </div>
                  <div class="card-body">

                  <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                  @csrf            
              
                           <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Titre</label>
                            <input type="text" class="form-control" name="title" placeholder="Titre">
                            </div>
                   
                  <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">image</label>
                            <input type="file" class="form-control" name="image" >
                   </div>
                    
                   
                   <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="body" rows="3" placeholder="Description"></textarea>
                        </div>
                        <div class="mb-3">
                        <button class="btn btn-primary">
                          Valider
                        </button>
                        </div>
                     
                  </form>
                  </div>
             </div>
    </div>

</div>
@endsection

