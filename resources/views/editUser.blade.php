@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateUser', ['id' => $user->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name">
                                <span id="name-error-msg" class="invalid-feedback" role="alert">
                                 <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                               
                                <span id="email-error-msg" class="invalid-feedback" role="alert">
                                  <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone">
                                
                                <span id="phone-error-msg" class="invalid-feedback" role="alert">
                                <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="NIC" class="col-md-4 col-form-label text-md-end">{{ __('NIC') }}</label>

                            <div class="col-md-6">
                                <input id="NIC" type="number" class="form-control @error('NIC') is-invalid @enderror" name="NIC" value="{{ $user->NIC }}" required autocomplete="NIC">

                                <span id="NIC-error-msg" class="invalid-feedback" role="alert">
                                <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width:100%">
                                    {{ __('Update User') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
      <script  type="application/javascript" src="{{ asset('js/edit-validation.js') }}"></script>                  
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   

@endsection