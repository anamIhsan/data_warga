<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Title --}}
    <title>@yield('title')</title>

    {{-- Style --}}
    @include('includes.style')
    
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
      </div>

      <!-- Navbar -->
      @include('includes.navbar')

      <!-- Main Sidebar Container -->
      @include('includes.sidebar')

      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">

            {{-- Title Page --}}
            <h1 class="m-0">@yield('title page')</h1>

          </div>
        </div>

        <!-- Content -->
        @yield('content')

      </div>

      <!-- Footer -->
      @include('includes.footer')

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>

    {{-- Script --}}
    @include('includes.script')

    @stack('scripts')

  </body>
</html>


