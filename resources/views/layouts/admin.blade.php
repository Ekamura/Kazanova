<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!--Styles -->
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" defer></script>
</head>
@include('inc.admin.header')

<main class="container-fluid">
    <div class="row">
    @include('inc.admin.sidebar')
    @include('inc.admin.main')
    </div>
</main>
</body>
</html>
