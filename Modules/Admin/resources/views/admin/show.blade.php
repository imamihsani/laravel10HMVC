<style>
    input,textarea,select{
        border-radius: 0px !important;
    }
    .tooltip { 
        pointer-events: none;
    }
    #map {
        height: 500px; 
    }
    .gps-button, .leaflet-routing-collapse-btn{
        padding:3px !important;
    }
    .custom-placeholder::placeholder {
        color: #db354b !important;           
        font-style: italic;   
        opacity: 1;         
    }
</style>
@extends('admin::layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="container-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4>Riwayat Tugas</h4>
                </div>
            </div>
        </div>
    </div>
    <section class="content p-0 m-0">
        <div class="container-fluid p-1 m-1">
            <div class="card">
                <div class="d-flex justify-content-center my-1 mx-1">
                    <input type="date" class="form-control form-control-sm col-lg-4 col-sm-3 filterdari" name="filter_dari" autocomplete="off" value="{{$dari}}">
                    <span class="mx-1 my-1">s.d</span>
                    <input type="date" class="form-control form-control-sm col-lg-4 col-sm-3 filtersampai" name="filter_sampai" autocomplete="off" value="{{$sampai}}">
                    <button data-toggle="tooltip" title="Cari" data-placement="left" class="btn btn-sm btn-success tombolfiltertanggal ml-1" type="button"><i class="fa fa-search"></i></button>
                </div>
                @foreach($riwayat_tugas as $r)
                    @php
                        $role = Auth::user()->role;
                        $userId = Auth::user()->id;

                        $petugasArray = !empty($r->petugas) ? explode(',', $r->petugas) : [];

                        $bolehTampil = in_array($role, ['Admin', 'Superadmin']) || in_array($userId, $petugasArray);
                    @endphp

                    @if($bolehTampil)
                    <div class="card-body mb-1" style="border:0.2px solid; border-color:green;">
                        <div class="col justify-content-start">
                            <div class="row">
                                <i class="fa fa-user col-auto"></i>
                                <div class="col-4">Petugas</div>
                                <textarea class="col-7 form-control form-control-sm pl-2 pt-0 pr-0 pb-0 m-0 text-dark custom-placeholder"
                                        placeholder="Belum ditentukan"
                                        style="border:none; font-size:16px; background-color:#ffffff"
                                        readonly rows="1">{{$r->nama_petugas}}</textarea>
                            </div>
                            <div class="row">
                                <i class="fa fa-calendar col-auto"></i>
                                <div class="col-4">Tanggal</div>
                                <div class="col-7">{{date('d/m/Y', strtotime($r->tgl_task))}}</div>
                            </div>
                            <div class="row">
                                <i class="fa fa-route col-auto"></i>
                                <div class="col-4">Rute</div>
                                <textarea class="col-7 form-control form-control-sm pl-1 pt-0 pr-0 pb-0 m-0 text-dark custom-placeholder"
                                        placeholder="Belum Ditentukan"
                                        style="border:none; font-size:16px; background-color:#ffffff"
                                        readonly rows="1">{{$r->rute}}</textarea>
                            </div>
                            <div class="row">
                                <i class="fa fa-map col-auto" style="font-size:14px;"></i>
                                <div class="col-4">Jarak</div>
                                <div class="col-7 pl-1">
                                    @if(!empty($r->jarak_rute))
                                        {{ $r->jarak_rute }} Km
                                    @else
                                        <i class="text-danger">Belum Dihitung</i>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <i class="fa fa-box col-auto"></i>
                                <div class="col-4">Total Sampah</div>
                                <div class="col-7 pl-1">
                                    @if($r->berat_sampah > 0)
                                        @php
                                            if ($r->berat_sampah >= 1000) {
                                                $nilai = number_format($r->berat_sampah / 1000, 1);
                                                $satuan = ' Ton';
                                            } else {
                                                $nilai = number_format($r->berat_sampah, 1);
                                                $satuan = ' Kg';
                                            }
                                        @endphp
                                        {{ $nilai . $satuan }}
                                    @else
                                        <i class="text-danger">Belum Diketahui</i>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <i class="fa fa-plus-square col-auto"></i>
                                <div class="col-4">
                                    <a data-toggle="collapse"
                                    href="#collapseDetail{{$r->id}}"
                                    aria-expanded="false"
                                    aria-controls="collapseExample">Detail</a>
                                </div>
                                <div class="collapse col-12" id="collapseDetail{{$r->id}}">
                                    <div class="card card-body">
                                        Catatan:
                                        @if(!empty($r->catatan))
                                            <i>{{ $r->catatan }}</i>
                                        @else
                                            <i class="text-danger">Tidak ada catatan</i>
                                        @endif
                                        <br>
                                        Perkiraan Bensin:
                                        @if(!empty($r->estimasi_biaya_bensin))
                                            {{ $r->estimasi_biaya_bensin }}
                                        @else
                                            0
                                        @endif
                                        Liter<br>
                                        <a class="mt-3" href="{{ url('peta/peta/view?id=' . $r->id) }}">Lihat Koordinat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach

            </div>
        </div>
    </section>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var hamburgermenuButton = document.querySelector('[data-widget="pushmenu"]');
        if (hamburgermenuButton) {
            hamburgermenuButton.click();
        }

        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        //filter tanggal di url
        $('.tombolfiltertanggal').on('click', function() {
            var dari = $('.filterdari').val();
            var sampai = $('.filtersampai').val();

            if (!dari || !sampai) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Tanggal belum lengkap',
                    text: 'Silakan isi kedua tanggal terlebih dahulu.',
                    confirmButtonColor: '#3085d6',
                });
                return;
            }

            var tglDari = new Date(dari);
            var tglSampai = new Date(sampai);

            if (tglSampai < tglDari) {
                Swal.fire({
                    icon: 'error',
                    title: 'Tanggal tidak valid',
                    text: 'Tanggal Sampai tidak boleh lebih kecil dari tanggal Dari!',
                    confirmButtonColor: '#d33',
                });
                return;
            }

   
            var baseUrl = window.location.origin + window.location.pathname;
            var newUrl = baseUrl + '?dari=' + encodeURIComponent(dari) + '&sampai=' + encodeURIComponent(sampai);
            window.location.href = newUrl;
        });

        // $(document).ready(function() {

        //     var table = $('#datatable').DataTable({
        //         responsive: false,
        //         lengthMenu: [10, 15, 25, 50, 100],
        //         pageLength: 50,
        //         paging: true,
        //         searching: true,
        //         ordering: true,
        //         info: true,
        //         scrollY: 360,
        //         scrollX: true,
        //         bScrollCollapse:true,
        //         fixedColumns:{
        //             leftColumns:4,
        //         },
        //         // rowCallback: function(row, data, index) {
        //         //     $('td:eq(0)', row).html(index + 1);
        //         // },
        //         dom: '<"py-1 px-1 d-flex justify-content-between align-items-center"l<"custom-html">f>rt<"bottom"ip><"clear">',
        //         initComplete: function() {
        //             $('#datatable thead th').removeClass('sorting sorting_asc sorting_desc');
        //             $("div.custom-html").html(`
        //                 <div class="d-flex align-items-center">
        //                     <input type="date" class="form-control form-control-sm" name="dari">
        //                     <span>s/d</span>
        //                     <input type="date" class="form-control form-control-sm" name="sampai">
        //                     <button class="btn btn-sm btn-primary ml-1" type="button" id="filter_tanggal" name="filter_tanggal">
        //                         <i class="fa fa-search"></i>
        //                     </button>
        //                     <select class="form-control form-control-sm ml-1" id="filter_jenis">
        //                         <option value="All">Filter Jenis</option>
        //                         <option value="Reguler">Reguler</option>
        //                         <option value="Express">Express</option>
        //                     </select>
        //                 </div>
        //             `); 

        //             $(document).ready(function() {
        //                 $('#filter_jenis').val('All');
        //                 $('#filter_jenis').trigger('change');
        //             });
        //             $('#filter_jenis').on('change', function() {
        //                 var selectedJenis = $(this).val();
        //                 if (selectedJenis === 'All') {
        //                 table.column(5).search('').draw();
        //                 } else {
        //                     table.column(5).search(selectedJenis).draw();
        //                 }
        //             });

        //             this.api().columns().every(function () {
        //                 var column = this;
        //                 var title = column.footer().textContent.trim();
        //                 if (title) { 
        //                     var input = document.createElement('input');
        //                     input.placeholder = 'Filter ' + title;
        //                     input.classList.add('form-control', 'form-control-sm');
        //                     column.footer().replaceChildren(input);
        //                     input.addEventListener('keyup', () => {
        //                         if (column.search() !== input.value) {
        //                             column.search(input.value).draw();
        //                         }
        //                     });
        //                 }
        //             });

                   

        //         },
                    
        //     });

        //     table.on('order.dt search.dt', function () {
        //         table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
        //             var pageInfo = table.page.info();
        //             var startIndex = pageInfo.start;  
        //             cell.innerHTML = startIndex + i + 1;
        //         });
        //     }).draw(); 

                    
           

        // });
        
      
        

  

        
       


        

       

    });
</script>
