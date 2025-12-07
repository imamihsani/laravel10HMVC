
<!DOCTYPE html>
<html>
    <head>
    <title>User Group Permission</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css')}}">

    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
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

        input,textarea,select{
            border-radius: 0px !important;
        }
        .tooltip { 
            pointer-events: none;
        }
        .dataTables_length{
            pointer-events:none;
            visibility:hidden;
        }
    </style>
    <form>
        <body>
            <div class="container-fluid">
                <h3 class="text-center">User Group Permission</h3>
                <table class="table table-sm table-bordered table-striped nowrap" id="datatable" width="100%;">
                    <thead class="table-primary">
                        <tr>
                            <th class="bg-success" style="width:30px;">No.</th>
                            <th class="bg-success" style="width:100px;">Module</th>
                            <th class="bg-success" style="width:225px;">Controller</th>
                            <th class="bg-success" style="width:200px;">Method</th>
                            <th class="bg-success">Route</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @php $rowCount = 0; @endphp
                        @foreach($modules as $module => $controllers)
                            @foreach($controllers as $controller => $methods)
                                @foreach($methods as $method)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="text-center font-weight-bold">{{ $module }}</td>
                                        <td><code class="text-dark">{{ $controller }}</code></td>
                                        <td>{{ $method['method'] }}</td>
                                        <td>
                                                <input type="checkbox" @if($rowCount++ < 4) disabled @endif value="{{str_replace('/index', '', $method['route'])}}" class="" name="">
                                                {{ str_replace('/index', '', $method['route']) }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                    <tfoot class="p-0 m-0">
                        <tr>
                            <th class="p-0" style="visibility:hidden;">No.</th>
                            <th class="p-0">Module</th>
                            <th class="p-0">Controller</th>
                            <th class="p-0">Method</th>
                            <th class="p-0">Route</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </body>
    </form>
</html>
<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- <script src="{{ asset('lte/plugins/datatables-bs4/js/jquery.dataTables.min.js') }}"></script> -->
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>


<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('lte/plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.min.js')}}"></script>





<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('lte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('lte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('lte/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('lte/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js')}}"></script>



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

    // window.addEventListener('load', function() {
    //   document.querySelector('.wrapper').style.visibility = 'visible';
    // });

    window.addEventListener('load', function() {
      const wrapper = document.querySelector('.wrapper');
      wrapper.style.visibility = 'visible';
      setTimeout(() => {
        wrapper.classList.add('loaded');
      }, 50); 
    });


    document.addEventListener('DOMContentLoaded', function() {
        var hamburgermenuButton = document.querySelector('[data-widget="pushmenu"]');
        if (hamburgermenuButton) {
            hamburgermenuButton.click();
        }

        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $(document).ready(function() {

            var table = $('#datatable').DataTable({
                responsive: false,
                lengthMenu: [
                    [10, 20, 50, 100, -1],
                    [10, 20, 50, 100, 'All']
                ],
                pageLength: -1,
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                scrollY: 380,
                scrollX: true,
                bScrollCollapse:true,
                // fixedColumns:{
                //     leftColumns:4,
                // },
                // rowCallback: function(row, data, index) {
                //     $('td:eq(0)', row).html(index + 1);
                // },
                dom: '<"py-1 px-1 d-flex justify-content-between align-items-center"l<"custom-html">f>rt<"bottom"ip><"clear">',
                initComplete: function() {
                    $('#datatable thead th').removeClass('sorting sorting_asc sorting_desc');
                    $("div.custom-html").html(`
                        <div class="d-flex align-items-center">
                            <div class="input-group">
                                <input type="text" readonly class="form-control form-control-sm" name="" value="">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success btn-sm" id="tombolSavePermission" type="submit">
                                        <i class="fas fa-save"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `); 

                    // $(document).ready(function() {
                    //     $('#filter_jenis').val('All');
                    //     $('#filter_jenis').trigger('change');
                    // });
                    // $('#filter_jenis').on('change', function() {
                    //     var selectedJenis = $(this).val();
                    //     if (selectedJenis === 'All') {
                    //     table.column(5).search('').draw();
                    //     } else {
                    //         table.column(5).search(selectedJenis).draw();
                    //     }
                    // });

                    this.api().columns().every(function () {
                        var column = this;
                        var title = column.footer().textContent.trim();
                        if (title) { 
                            var input = document.createElement('input');
                            input.placeholder = 'Filter ' + title;
                            input.classList.add('form-control', 'form-control-sm', 'm-0');
                            column.footer().replaceChildren(input);
                            input.addEventListener('keyup', () => {
                                if (column.search() !== input.value) {
                                    column.search(input.value).draw();
                                }
                            });
                        }
                    });

                   

                },
                    
            });

            table.on('order.dt search.dt', function () {
                table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                    var pageInfo = table.page.info();
                    var startIndex = pageInfo.start;  
                    cell.innerHTML = startIndex + i + 1;
                });
            }).draw(); 

                    
           

        });
        
      



       


        

       

    });
</script>