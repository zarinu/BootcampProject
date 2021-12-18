@extends('user.layouts.master')
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
            <p>WELLCOME TO YOUR PROFILE PANEL DEAR {{ Auth::user()->name }}</p>
            </div>
      </div>
      {{-- for show ades --}}
      <div class="d-grid " style="margin-top: 50px;">
          <a href="#">
        <button type="button" class="btn btn-block" style="background-color:#E7D2CC ">Click For Veiw All Ads</button>
          </a>
      </div>

</div>
@endsection
