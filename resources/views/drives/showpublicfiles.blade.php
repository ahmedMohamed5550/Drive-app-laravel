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
            <h3>Tittle : {{$drives->drivetittle}}</h3>
            <hr>
            <h3>Dsecription : {{$drives->drivedesc}}</h3>
            <hr>
            <h3>Name : {{$drives->username}}</h3>
            <hr>
            <h3>Email : {{$drives->useremail}}</h3>
            <hr>
            <h3>File : {{$drives->drivefile}}</h3>
        </div>
        <a href="{{route('drives.download',$drives->driveid)}}" class="btn btn-info">Download</a>
    </div>
</div>

@endsection
