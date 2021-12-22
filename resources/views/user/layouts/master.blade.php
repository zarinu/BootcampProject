<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" ></link>
    <link rel="stylesheet" href="{{asset('js/app.js')}}" ></link>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>{{config('app.name')}}</title>
</head>
<body>
    <div class="container-fluid">
    @include('user.layouts.partials.header')
        <div class="row">
            {{-- <div class="col-sm-2 mt-3">
                @include('layouts.partials.sideBar')
            </div> --}}
            <div class="col-sm-12">
                @yield('content')
            </div>
          </div>
    </div>

</body>
</html>
