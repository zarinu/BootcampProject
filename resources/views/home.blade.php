@extends('layouts.masterUserPanel')
@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header" style="background-color:#E7D2CC">{{ __('Dashboard') }}</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            <p></p>
            {{ __('You are logged in!') }}
            </div>
      </div>

</div>
@endsection
