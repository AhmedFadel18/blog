<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.includes.head')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar -->
      @include('admin.includes.sidebar')
      <!-- partial:partials/navbar -->
      @include('admin.includes.navbar')
      <!-- partial -->
@yield('content')
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
 @include('admin.includes.scripts')
  </body>
</html>
