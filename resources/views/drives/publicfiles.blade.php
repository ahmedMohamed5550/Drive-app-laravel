@extends('layouts.app')

@section('content')
<h1 class="text-center">List Files</h1>
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
            <table class="table table-dark">
                <thead>
                    <td>Id</td>
                    <td>Tittle</td>
                    <td>Email</td>
                    <td colspan="">Action</td>
                </thead>
                <tbody>
                    @forelse ($drives as $item)
                    <tr>
                        <td>{{$item->driveid}}</td>
                        <td>{{$item->drivetittle}}</td>
                        <td>{{$item->useremail}}</td>
                        <td><a href="{{route('drives.showpublicfiles',$item->driveid)}}"> <i class="fa-solid fa-eye" style="color: #fe9706;"></i></a></td>
                    </tr>
                    @empty
                    <h1>No Public Data</h1>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
