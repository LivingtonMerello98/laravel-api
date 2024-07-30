<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>Document</title>
</head>
<body>
   
    @include('shared.header')

    @include('guest-components.hero')

      @yield('about')
      @yield('content')
      @yield('contact')
     
      @include('shared.footer') 

</body>
</html>