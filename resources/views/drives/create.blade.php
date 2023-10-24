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

@if ($errors->any())
<div class="alert alert-danger mx-auto col-md-6">
<ul>
   @foreach ($errors->all() as $errors)
    <li>{{$errors}}</li>
   @endforeach
</ul>
</div>
@endif
<div class="container col-md-6">
<div class="card">
    <div class="card-body">
        <form action="{{route('drives.store')}}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tittle</label>
                <input type="text" name="tittle" value="{{old('tittle')}}"  class="form-control" placeholder="Tittle">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" value="{{old('description')}}" class="form-control" placeholder="Description">
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
