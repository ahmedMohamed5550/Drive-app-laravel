@extends('layouts.app')

@section('content')

<h1 class="text-center ">Show File</h1>
@if (Session::has('done'))
<div class="container col-md-6">
    <div class="alert alert-success text-center">
        {{Session::get('done')}}
        </div>
</div>
@endif

<div class="container col-md-4">
    <div class="card">

            <img class="img-top img-fluid" src="{{asset('img/img2.jpg')}}">

        <div class="card-body">
            <h3>Tittle : {{$drives->tittle}}</h3>
            <hr>
            <h3>Dsecription : {{$drives->description}}</h3>
            <hr>
            <h3>File : {{$drives->file}}</h3>
        </div>
        <a href="{{route('drives.download',$drives->id)}}" class="btn btn-info">Download</a>
    </div>
</div>

@endsection
