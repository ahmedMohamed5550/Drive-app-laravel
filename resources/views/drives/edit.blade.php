@extends('layouts.app')

@section('content')

<h1 class="text-center">Upload File</h1>
@if (Session::has('done'))
<div class="container col-md-6">
    <div class="alert alert-success text-center">
        {{Session::get('done')}}
        </div>
</div>
@endif

<div class="container col-md-6">
<div class="card">
    <div class="card-body">
        <form action="{{route('drives.update',$drives->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tittle</label>
                <input type="text" value="{{$drives->tittle}}" name="tittle" class="form-control" placeholder="Tittle">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" value="{{$drives->description}}" name="description" class="form-control" placeholder="Description">
            </div>
            <div class="form-group">
                <label>Upload File</label>
                <input type="file" name="inputfile" class="form-control" placeholder="Upload File">
            </div>
            <button class="btn btn-info" name="upload">Upload File</button>
        </form>
    </div>
</div>
</div>

@endsection
