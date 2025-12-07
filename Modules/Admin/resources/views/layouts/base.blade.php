<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="manifest" href="{{ asset('manifest.json') }}">
  <meta name="theme-color" content="#007bff">
  <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
  <link rel="icon" href="{{ asset('images/logo.png')}}">
  <meta name="apple-mobile-web-app-capable" content="yes">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css')}}"> -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css')}}">

  <!-- Leaflet (load di laman pas pakai saja)-->
  <!-- <link rel="stylesheet" href="{{ asset('lte/plugins/leaflet/dist/leaflet.css') }}" />
  <link rel="stylesheet" href="{{ asset('lte/plugins/leaflet/dist/Control.Geocoder.css') }}" />
  <link rel="stylesheet" href="{{ asset('lte/plugins/leaflet/dist/leaflet-gps.css') }}" />
  <link rel="stylesheet" href="{{ asset('lte/plugins/leaflet/dist/leaflet-routing-machine.css')}}" /> -->


  <!-- Font Awesome icons -->
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome/free_7/css/all.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css')}}"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.css')}}"> -->
  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet"> -->
  <!--Sweet Alert-->
  <link rel="stylesheet" href="{{ asset('lte/plugins/sweetalert2/sweetalert2.min.css') }}">
  <!-- Select2-->
  <link href="{{ asset('lte/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('lte/plugins/select2/css/select2-bootstrap4.min.css') }}" rel="stylesheet" />
  <style>
    body{
        font-family:'Outfit', sans-serif; line-height:1.2;
    }
    .card{
        border-radius: 0;
    }
    h1,h2,h3,h4,h5{
        margin-bottom: 0;
    }
    .table-sm tbody tr td, .table-sm thead tr th, .table-sm tfoot tr th{
        padding-left:2px;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
    }
    .table-sm thead tr th{
        text-align:center;
    }
    .btn-sm{
      border-radius: 0;
    }
    .table-sm tbody tr td input, .table-sm tbody tr td textarea, .table-sm tbody tr td select{
      border-radius: 0px;
    }
    #datatable_wrapper .row {
      padding-top: 0.25rem;   /* Equivalent to py-1 */
      padding-bottom: 0.25rem; /* Equivalent to py-1 */
      padding-left: 1rem;      /* Adjust left padding to a reasonable value */
      padding-right: 1rem;    
    }
    #datatable_wrapper .row .col-sm-12 {
      padding:0;
    }
    .DTFC_LeftFootWrapper {
      display:none;
    }
    th.sorting::after,
    th.sorting::before,
    th.sorting_asc::after,
    th.sorting_desc::after,
    th.sorting_asc::before,
    th.sorting_desc::before {
        visibility: hidden !important;
    }

    /* Overlay yang menutupi seluruh layar */
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang putih dengan transparansi */
        z-index: 9999;
        display: none; /* Awalnya disembunyikan */
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    /* Style untuk tulisan 'Loading...' */
    .loading-text {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .wrapper {
      visibility: hidden;
      position: relative;
      overflow: hidden;
    }
    
    .wrapper::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: white; /* Sesuaikan dengan warna background Anda */
      transform: translateY(0);
      transition: transform 0.3s ease-out;
      z-index: 10;
    }
    
    .wrapper.loaded::after {
      transform: translateY(-100%);
    }

    .select2-container--bootstrap4 .select2-selection--single {
      border-radius: 0px;
      max-height:27px;
      margin-bottom:3px;
    }

    .select2-selection__arrow{
      margin-top:-3px !important;
    }

    .select2-container--bootstrap4 .select2-selection__rendered {
      margin-top: -7px; margin-left:-3px;
    }

    .select2-container--bootstrap4 .select2-selection--multiple {
      border-radius: 0px !important;
      max-height: 20px !important;
      display: flex !important;
      flex-wrap: wrap !important;
      align-items: center !important;
      overflow-y: auto !important;
      scrollbar-width: thin; /* biar scroll tipis */
      padding: 0 3px !important;
      margin-bottom: 3px !important;
    }

    .select2-container--bootstrap4 .select2-selection--multiple .select2-search__field {
      height: 18px !important;
      width: 90% !important;
      font-family: 'Outfit', sans-serif;
      line-height: 1.2;
      padding: 0 2px !important;
      margin: 1px 0 !important;
      box-sizing: border-box;
    }

    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
      border-radius: 0px !important;
      font-size: 0.8rem !important;
      line-height: 1.2 !important;
      margin: 1px 2px 1px 0 !important;
      padding: 0 5px !important;
      background-color: #f8f9fa !important;
      border: 1px solid #ced4da !important;
      color: #495057 !important;
    }

    .select2-search--inline{
      margin-top:-7px !important;
    }



    
  </style>
</head>


@push('admin_scripts')

    <!-- jQuery -->
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- <script src="{{ asset('lte/plugins/datatables-bs4/js/jquery.dataTables.min.js') }}"></script> -->
    <script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>


    <script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('lte/plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.min.js')}}"></script>


    <!-- Link to Leaflet JS --> <!--load pas dibutuhin aja-->
    <!-- <script src="{{ asset('lte/plugins/leaflet/dist/leaflet.js') }}"></script>
    <script src="{{ asset('lte/plugins/leaflet/dist/Control.Geocoder.js') }}"></script>
    <script src="{{ asset('lte/plugins/leaflet/dist/leaflet-gps.js') }}"></script>
    <script src="{{ asset('lte/plugins/leaflet/dist/leaflet-routing-machine.js')}}"></script> -->



    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <!-- <script src="{{ asset('lte/plugins/chart.js/Chart.min.js')}}"></script> -->
    <!-- Sparkline -->
    <!-- <script src="{{ asset('lte/plugins/sparklines/sparkline.js')}}"></script> -->
    <!-- JQVMap -->
    <!-- <script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> -->
    <!-- jQuery Knob Chart -->
    <!-- <script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js')}}"></script> -->
    <!-- daterangepicker -->
    <script src="{{ asset('lte/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <!-- <script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js')}}"></script> -->
    <!-- overlayScrollbars -->
    <!-- <script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script> -->
    <!-- AdminLTE App -->
    <script src="{{ asset('lte/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="{{ asset('lte/dist/js/pages/dashboard.js')}}"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="{{ asset('lte/dist/js/demo.js')}}"></script> -->
    <!-- SweetAlert2 -->
    <script src="{{ asset('lte/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('lte/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Autocomplete -->
    <script src="{{ asset('lte/plugins/autocomplete/autocomplete-0.3.0.min.js') }}"></script>
    <!-- Scanner QRCode -->
    <script src="{{ asset('lte/plugins/html5-qrcode/html5-qrcode.min.js') }}"></script>
    <!-- Highcharts js-->
    <script src="{{ asset('lte/plugins/highchartsjs/code/highcharts.js') }}"></script>


    <script>
        // Tampilkan overlay saat mulai loading
        function showLoadingOverlay() {
            document.getElementById('loading-overlay').style.display = 'flex';
        }

        // Sembunyikan overlay saat sudah selesai
        function hideLoadingOverlay() {
            document.getElementById('loading-overlay').style.display = 'none';
        }

        // Saat reload/refresh mulai, tampilkan overlay
        window.addEventListener('beforeunload', function() {
            showLoadingOverlay();
        });

        // Saat SEMUA resources halaman sudah selesai load, sembunyikan overlay
        window.addEventListener('load', function() {
            hideLoadingOverlay();
        });

        //reload dulu kalau di-back
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) { 
            window.location.reload();
            }
        });

        // reload juga kalau di-forward
        window.addEventListener('pageshow', function() {
            const navEntries = performance.getEntriesByType("navigation");
            if (navEntries.length > 0 && navEntries[0].type === "back_forward") {
                window.location.reload();
            }
        });

        window.addEventListener('load', function() {
          const wrapper = document.querySelector('.wrapper');
          wrapper.style.visibility = 'visible';
          setTimeout(() => {
              wrapper.classList.add('loaded');
          }, 50); 
        });
    </script>
    <script>
      if ('serviceWorker' in navigator) {
          window.addEventListener('load', () => {
              navigator.serviceWorker.register('{{ asset('service-worker.js') }}')
                  .then(reg => console.log('Service Worker didaftarkan', reg))
                  .catch(err => console.error('Service Worker gagal', err));
          });
      }
    </script>
@endpush


