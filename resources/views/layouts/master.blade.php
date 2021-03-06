<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" ></link>
    <link rel="stylesheet" href="{{asset('js/app.js')}}" ></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>{{config('app.name')}}</title>
</head>
<body>

        @include('layouts.partials.header')
        <div class="container-fluid p-3  border ">
            <div class="row">
                <div class="col-sm-2">
                    @include('layouts.partials.sideBar')

                </div>
                <div class="col-sm-10">
                    @yield('content')
                </div>
              </div>
        </div>
        @include('layouts.partials.footer')

</body>
</html>
