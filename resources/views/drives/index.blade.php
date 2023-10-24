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
                    <td colspan="3">Action</td>
                    <td>Status</td>
                </thead>
                <tbody>
                    @forelse ($drives as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->tittle}}</td>
                        <td><a href="{{route('drives.show',$item->id)}}"> <i class="fa-solid fa-eye" style="color: #ffae00;"></i></a></td>
                        <td><a href="{{route('drives.edit',$item->id)}}"> <i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i></a></td>
                        <td><a onclick="return confirm('Are You Sure ?')" href="{{route('drives.destroy',$item->id)}}"> <i class="fa-solid fa-trash" style="color: #c41717;"></i></a></td>
                        @if ($item->status == 'private')
                        <td><a href="{{route('drives.changeStatus',$item->id)}}"> <i class="fa-solid fa-lock" style="color: #4c79c8;"></i></a></td>
                        @else
                        <td><a href="{{route('drives.changeStatus',$item->id)}}"> <i class="fa-solid fa-lock-open" style="color: #4c79c8;"></i></a></td>
                        @endif
                    </tr>
                    @empty
                    <h1>No Data</h1>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
