<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.layouts.head')
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    @include('admin.layouts.header')

    @include('admin.layouts.sidebar')
    
    <div class="content-wrapper">
      
      @section('main-content')
        @show
        
    </div>
    
    @include('admin.layouts.footer')

  </div>

</body>

</html>
