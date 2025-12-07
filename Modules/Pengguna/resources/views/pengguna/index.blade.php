<style>
    input,textarea,select{
        border-radius: 0px !important;
    }
    .tooltip { 
        pointer-events: none;
    }
    
</style>
@extends('pengguna::layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="container-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4>Pengguna</h4>
                </div>
            </div>
        </div>
    </div>
    <section class="content p-0 m-0">
        <div class="container-fluid p-0 m-0">
            <div class="card">
                <div class="p-1 m-0">
                   <a href="{{ url('/pengguna/pengguna/create?rl=sadm') }}" class="btn btn-sm btn-success btn-block"><i class="fa fa-user-plus"></i> Tambah Superadmin</a>
                   <a href="{{ url('/pengguna/pengguna/create?rl=cmu') }}" class="btn btn-sm btn-success btn-block"><i class="fa fa-users"></i> Tambah Common User</a>
                   <hr>
                    <table class="table table-striped table-bordered nowrap table-sm p-1 m-0" id="datatable" style="width:100%;"> 
                        <thead class="d-none">
                            <tr>
                            <th scope="col">#</th>
                            </tr>
                        </thead>    
                        <tbody>
                            @foreach ($sadm as $index => $adm)
                            <tr>
                            <td>{{$adm->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="d-none">
                            <tr>
                                <td>#</td>
                            </tr>
                        </tfoot>
                    </table>

                    <table class="table table-striped table-bordered nowrap table-sm p-1 m-0" id="datatable2" style="width:100%;"> 
                        <thead class="d-none">
                            <tr>
                            <td scope="col">#</td>
                            </tr>
                        </thead>    
                        <tbody>
                            @foreach ($cmu as $index => $ptg)
                            <tr>
                            <td>{{$ptg->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="d-none">
                            <tr>
                                <td>#</td>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- <div class="col-12">
                        <form method="post" action="{{ route('pengguna.store') }}">
                            @csrf
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered nowrap m-0" style="max-width:100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th scope="col" colspan="5">
                                                <button class="btn btn-sm btn-block btn-success" type="button" data-toggle="collapse" data-target="#collapseKronologis" aria-expanded="false" aria-controls="collapseExample">
                                                <b>Koordinat</b>
                                                </button>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Nama Lokasi</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Alamat</th>
                                            <th><button id="tambahrowkoordinat" class="btn btn-sm btn-success" type="button"><i class="fa fa-plus"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody class="collapse show" id="collapseKoordinat">
                                        <tr id="tr_koordinat">
                                            <th class="p-0">
                                            <input type="hidden" name="koordinat_id[]" value="{">
                                            <input readonly type="text" name="nama_koordinat[]" value="" class="form-control form-control-sm" autocomplete="off" required>
                                            </th>
                                            <td class="p-0"><input type="text" name="latitude[]" value="" class="form-control form-control-sm" autocomplete="off"></td>
                                            <td class="p-0"><input type="text" name="longitude[]" value="" class="form-control form-control-sm" autocomplete="off"></td>
                                            <td class="p-0">
                                            <textarea rows="1" type="text" name="alamat[]" class="form-control form-control-sm" autocomplete="off"></textarea>
                                            </td>
                                            <td class="p-0" align="center">
                                            <button class="btn btn-sm btn-danger hapusrow" type="button"><i class="fa fa-minus"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success btn-sm mt-2"><i class="fa fa-save"></i> Tambahkan</button>
                            </div>
                        </form>
                    </div> -->
                </div>
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

        // $(document).ready(function() {

        //     var table = $('#datatable').DataTable({
        //         responsive: false,
        //         // lengthMenu: [10, 15, 25, 50, 100],
        //         // pageLength: 50,
        //         paging: false,
        //         searching: true,
        //         ordering: true,
        //         info: false,
        //         scrollY: 200,
        //         scrollX: true,
        //         bScrollCollapse:true,
        //         // fixedColumns:{
        //         //     leftColumns:4,
        //         // },
        //         // rowCallback: function(row, data, index) {
        //         //     $('td:eq(0)', row).html(index + 1);
        //         // },
                
        //         dom: '<"py-1 px-1 d-flex justify-content-between align-items-center"l<"custom-html">f>rt<"bottom"ip><"clear">',
        //         initComplete: function() {
        //             $('#datatable thead th').removeClass('sorting sorting_asc sorting_desc');
        //             $("div.custom-html").html(`
        //                 <h5><b>Admin</b></h5>
        //             `); 

        //             // $(document).ready(function() {
        //             //     $('#filter_jenis').val('All');
        //             //     $('#filter_jenis').trigger('change');
        //             // });
        //             // $('#filter_jenis').on('change', function() {
        //             //     var selectedJenis = $(this).val();
        //             //     if (selectedJenis === 'All') {
        //             //     table.column(5).search('').draw();
        //             //     } else {
        //             //         table.column(5).search(selectedJenis).draw();
        //             //     }
        //             // });

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

        $(document).ready(function() {

            function initDataTable(tableId, title) {
                var table = $(tableId).DataTable({
                    responsive: false,
                    paging: false,
                    searching: true,
                    ordering: true,
                    info: false,
                    scrollY: 200,
                    scrollX: true,
                    bScrollCollapse: true,
                    dom: '<"py-1 px-1 d-flex justify-content-between align-items-center"l<"custom-html">f>rt<"bottom"ip><"clear">',
                    initComplete: function() {
                        // Hilangkan sorting classes di header
                        $(tableId + ' thead th').removeClass('sorting sorting_asc sorting_desc');

                        // Isi custom-html div dengan judul spesifik
                        // $("div.custom-html").html(`<h5><b>${title}</b></h5>`);
                        $(tableId).closest('.dataTables_wrapper').find('div.custom-html').html(`<h5><b>${title}</b></h5>`);

                        // Buat filter input di footer untuk tiap kolom
                        this.api().columns().every(function () {
                            var column = this;
                            var title = column.footer().textContent.trim();
                            if (title) { 
                                var input = document.createElement('input');
                                input.placeholder = 'Filter ' + title;
                                input.classList.add('form-control', 'form-control-sm');
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

                // // Buat kolom pertama jadi nomor urut yang update saat order/search
                // table.on('order.dt search.dt', function () {
                //     table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                //         var pageInfo = table.page.info();
                //         var startIndex = pageInfo.start;  
                //         cell.innerHTML = startIndex + i + 1;
                //     });
                // }).draw();

                return table;
            }

            // Panggil fungsi inisialisasi untuk masing-masing tabel
            var table1 = initDataTable('#datatable', 'Admin');
            var table2 = initDataTable('#datatable2', 'Pengguna');
    
        });

        
      
        

  

        
    


        //fungsi clone row
        // $(document).ready(function() {
        //     $('#tambahrowkoordinat').on('click', function() {

        //         // Baris baru yang ingin ditambahkan
        //         var newRow = `
        //             <tr>
        //                 <th class="p-0">
        //                     <input type="hidden" name="koordinat_id[]" value="">
        //                     <input readonly type="text" name="nama_koordinat[]" class="form-control form-control-sm namakoordinat" autocomplete="off" required value="${nextColumn}">
        //                 </th>
        //                 <td class="p-0">
        //                     <input type="text" name="latitude[]" class="form-control form-control-sm" autocomplete="off">
        //                 </td>
        //                 <td class="p-0">
        //                     <input type="text" name="longitude[]" class="form-control form-control-sm" autocomplete="off">
        //                 </td>
        //                 <td class="p-0">
        //                 <textarea rows="1" type="text" name="alamat[]" class="form-control form-control-sm" autocomplete="off"></textarea>
        //                 </td>
        //                 <td class="p-0" align="center">
        //                     <button class="btn btn-sm btn-danger removerowkoordinat" type="button"><i class="fa fa-minus"></i></button>
        //                 </td>
        //             </tr>
        //         `;

        //         // Menambahkan baris baru ke dalam tabel
        //         $('#collapseKoordinat').append(newRow);

        //         // Inisialisasi ulang Select2 pada elemen yang baru ditambahkan
        //         // $('.pic').select2({
        //         //     placeholder: 'Pilih PIC dari MSA/WIN/Pihak Eksternal',
        //         //     allowClear: true,
        //         //     width: 'resolve',
        //         //     maximumSelectionLength: 1,
        //         //     tags: true, // Mengizinkan input kustom
        //         //     createTag: function (params) {
        //         //         var term = $.trim(params.term);
        //         //         if (term === 'Pihak eksternal') {
        //         //             return {
        //         //                 id: 'Pihak eksternal',
        //         //                 text: 'Pihak eksternal',
        //         //                 isNew: true
        //         //             };
        //         //         }
        //         //         return {
        //         //             id: params.term,
        //         //             text: params.term
        //         //         };
        //         //     }
        //         // });
        //         // $('.pic').on('select2:select', function (e) {
        //         //     if ($(this).val().length >= 1) {
        //         //         $(this).next('.select2-container').find('.select2-search__field').prop('disabled', true);
        //         //     }
        //         // });

        //         // $('.pic').on('select2:unselect', function (e) {
        //         //     if ($(this).val().length === 0) {
        //         //         $(this).next('.select2-container').find('.select2-search__field').prop('disabled', false);
        //         //     }
        //         // });
        //     });

        //     // Menghapus baris jika tombol minus diklik
        //     $(document).on('click', '.removerowkoordinat, .hapusrow', function() {
        //         $(this).closest('tr').remove();
        //     });



          
        // });
       


        

       

    });
</script>
