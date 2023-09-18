@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if (session('delete'))
                <div class="alert alert-danger">
                    {{session('delete')}}
                </div>
                @endif

                <div class="card-header">{{ __('viewUsers') }}</div>

                <div class="card-body">
                    <table class="table-responsive table table-hover table-dark" style="text-align :center">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>NIC</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        @foreach($data as $item)
                      
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->NIC}}</td>
                            <td><a href="/deleteUser/{{$item->id}}" class="btn btn-danger btn-sm">Remove</a></td>
                            <td><a href="/editUser/{{$item->id}}" class="btn btn-primary btn-sm">Edit</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
