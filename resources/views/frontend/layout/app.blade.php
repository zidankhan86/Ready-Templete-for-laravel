<!DOCTYPE html>



<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lomeyo Blog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- theme meta -->
    <meta name="theme-name" content="revolve" />
    {{-- CSS --}}
    @include('frontend\components\fixed\style')

</head>
<body>

    {{-- Nav --}}
    @include('frontend\components\fixed\header')


    {{-- Content --}}
    @yield('content')


    {{-- Footer --}}
    @include('frontend\components\fixed\footer')


    {{-- Js --}}
    @include('frontend\components\fixed\script')


</body>
</html>
