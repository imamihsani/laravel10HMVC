<style>
    input,textarea,select{
        border-radius: 0px !important;
    }
    .tooltip { 
        pointer-events: none;
    }
    
</style>
@extends('superadmin::layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="container-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4>Superadmin</h4>
                </div>
            </div>
        </div>
    </div>
    <section class="content p-0 m-0">
        <div class="card">
            <form method="POST" action="{{route('superadmin.store')}}">
                @csrf
                <body>
                    <div class="container-fluid">
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
                                                    @php
                                                        $rolePermissions = json_decode($role->permissions, true) ?? [];
                                                    @endphp
                                                    <input type="checkbox" value="{{ str_replace('/index', '', $method['route']) }}" name="permissions[]" @if(in_array(str_replace('/index', '', $method['route']), $rolePermissions)) checked @endif> {{ str_replace('/index', '', $method['route']) }}
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

        $(document).ready(function() {

            var table = $('#datatable').DataTable({
                responsive: false,
                lengthMenu: [10, 15, 25, 50, 100],
                pageLength: 50,
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                scrollY: 345,
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
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" class="form-control form-control-sm col-3" readonly style="background-color:transparent; border:none;" value="Role: ">
                            <input type="hidden" class="form-control form-control-sm" readonly value="{{ $id }}" name="id[]">
                            <input type="text" class="form-control form-control-sm" style="font-weight:bold;" readonly value="{{ $role->nama_role }}" name="nama_role[]">
                            <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i></button>
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

            table.on('order.dt search.dt', function () {
                table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                    var pageInfo = table.page.info();
                    var startIndex = pageInfo.start;  
                    cell.innerHTML = startIndex + i + 1;
                });
            }).draw(); 





       

                    
           

        });

        // $(document).ready(function() {

        //     function initDataTable(tableId, title) {
        //         var table = $(tableId).DataTable({
        //             responsive: false,
        //             paging: false,
        //             searching: true,
        //             ordering: true,
        //             info: false,
        //             scrollY: 200,
        //             scrollX: true,
        //             bScrollCollapse: true,
        //             dom: '<"py-1 px-1 d-flex justify-content-between align-items-center"l<"custom-html">f>rt<"bottom"ip><"clear">',
        //             initComplete: function() {
        //                 // Hilangkan sorting classes di header
        //                 $(tableId + ' thead th').removeClass('sorting sorting_asc sorting_desc');

        //                 // Isi custom-html div dengan judul spesifik
        //                 // $("div.custom-html").html(`<h5><b>${title}</b></h5>`);
        //                 $(tableId).closest('.dataTables_wrapper').find('div.custom-html').html(`<h5><b>${title}</b></h5>`);

        //                 // Buat filter input di footer untuk tiap kolom
        //                 this.api().columns().every(function () {
        //                     var column = this;
        //                     var title = column.footer().textContent.trim();
        //                     if (title) { 
        //                         var input = document.createElement('input');
        //                         input.placeholder = 'Filter ' + title;
        //                         input.classList.add('form-control', 'form-control-sm');
        //                         column.footer().replaceChildren(input);
        //                         input.addEventListener('keyup', () => {
        //                             if (column.search() !== input.value) {
        //                                 column.search(input.value).draw();
        //                             }
        //                         });
        //                     }
        //                 });
        //             },
        //         });

        //         // // Buat kolom pertama jadi nomor urut yang update saat order/search
        //         // table.on('order.dt search.dt', function () {
        //         //     table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
        //         //         var pageInfo = table.page.info();
        //         //         var startIndex = pageInfo.start;  
        //         //         cell.innerHTML = startIndex + i + 1;
        //         //     });
        //         // }).draw();

        //         return table;
        //     }

        //     // Panggil fungsi inisialisasi untuk masing-masing tabel
        //     var table1 = initDataTable('#datatable', 'Admin');
        //     var table2 = initDataTable('#datatable2', 'Petugas');

        // });

        
      
        

  

        
    


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
