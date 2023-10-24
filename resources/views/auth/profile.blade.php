@extends('layouts.app')

@section('content')

<h1 class="text-center ">{{Auth::user()->name}} Profile</h1>
@if (Session::has('done'))
<div class="container col-md-6">
    <div class="alert alert-success text-center">
        {{Session::get('done')}}
        </div>
</div>
@endif

<div class="container col-md-3">
    <div class="card">

        <img class="img-top img-fluid" src="{{asset('profile'.'/' . Auth::user()->image)}}">

        <div class="card-body">
            <h5>Name : {{Auth::user()->name}}</h3>
            <hr>
            <h5>Email : {{Auth::user()->email}}</h3>
            <hr>
            <!-- Button trigger modal -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Upload Image
        </button>
        </div>

    </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header bg-dark">
          <h5 class="modal-title fs-5" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('user.uploadimage',Auth::user()->id)}}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" name="inputfile" class="form-control" placeholder="Upload Image">
                </div>
                <button class="btn btn-primary" name="upload">Save Changes</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

@endsection




