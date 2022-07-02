
@extends('master.layout')
@section('title')
  Accueil
@endsection
@section('style')

@endsection

@section('content')
<div class="row my-4">
    <div class="col-md-12">
      @if(session()->has('sucess'))
      <div class="alert alert-success">

         {{ session()->get('sucess') }}
      </div>
     
      @endif
      <div class="row">
     @foreach($posts as $post)
     

     <div class="col-md-4 mb-2">
           <div class="card h-100 ">
            <img src=" {{ asset('./uploads/'.$post->image) }}" class="card-img-top" alt="...">
        
                 <div class="card-body">
                        <h5 class="card-title">{{ $post["title"]}}</h5>
                            <p class="card-text">{{ $post["body"]}}</p>
                                  <a href="{{ route('post.show',$post->slug) }}" class="btn btn-primary">Voir</a>
                  </div>
            </div>
  
       </div>

     @endforeach
  </div>
  <div>

    
  </div class="d-flex justify-content-center my-4">
   {{ $posts->links() }}  
</div>

</div>
@endsection


