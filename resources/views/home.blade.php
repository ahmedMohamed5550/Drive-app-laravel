@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header"><h4>Home page</h3></div> --}}

                <div class="card-body">
                    <h1 class="">Hello {{ Auth::user()->name }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
