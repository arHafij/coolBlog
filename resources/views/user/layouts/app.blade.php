<!DOCTYPE html>
<html lang="en">

  <head>
    @include('user.layouts.head')

    @section('css')
    @show
  </head>

  <body>
    @include('user.layouts.header')
    
    @section('main-content')
    @show 

    @include('user.layouts.footer')

    @section('js')
    @show
  </body>

</html>
