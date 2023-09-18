@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div style="text-align: center">
                        <a href="/addUser" class="btn btn-primary">Add User</a>
                        <a href="/viewUsers" class="btn btn-warning">View Users</a>
                        <a href="/viewUsers" class="btn btn-danger">Edit & Delete Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
