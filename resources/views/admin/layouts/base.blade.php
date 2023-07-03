
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Stream || @yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('stisla/modules/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap-daterangepicker/daterangepicker.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
    {{-- Navbar --}}
    @include('admin.layouts.navbar')
    
    {{-- Sidebar  --}}
    @include('admin.layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>@yield('title')</h1>
              </div>
            {{-- Content --}}
            @yield('content')
        </section>
      </div>
      {{-- Footer --}}
      @include('admin.layouts.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('stisla/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('stisla/modules/popper.js') }}"></script>
  <script src="{{ asset('stisla/modules/tooltip.js') }}"></script>
  <script src="{{ asset('stisla/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('stisla/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('stisla/modules/moment.min.js') }}"></script>
  <script src="{{ asset('stisla/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset('stisla/modules/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('stisla/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('stisla/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('stisla/modules/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('stisla/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('stisla/js/page/modules-datatables.js') }}"></script>

  @yield('js')
  
  <!-- Template JS File -->
  <script src="{{ asset('stisla/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/js/custom.js') }}"></script>
<!-- Code injected by live-server -->

</body>
</html>