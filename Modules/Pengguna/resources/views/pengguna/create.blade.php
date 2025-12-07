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
                    <h4>{{ $role == 'sadm' ? 'Tambah Admin' : ($role == 'cmu' ? 'Tambah Common User' : 'Tambah Pengguna') }}</h4>
                </div>
            </div>
        </div>
    </div>
    <section class="content p-0 m-0">
        <div class="container-fluid p-0 m-0">
            <div class="card">
                <div class="p-1 m-0">
                    <div class="col-12">
                        <form method="POST" id="formCreatePengguna" action="{{ route('pengguna.store') }}">
                            @csrf
                            
                            <div id="containerPengguna">
                                <div class="card mb-3 pengguna-card">
                                    <div class="card-body">
                                        <div class="alert alert-sm alert-success d-flex justify-content-between p-0 m-1" style="border-radius:0;">
                                            <a href="{{ url('/pengguna/pengguna') }}" style="text-decoration:none;" type="button" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-sm btn-danger hapusCard"><i class="fa fa-minus"></i> Hapus</button>
                                                <button id="tambahCardPengguna" type="button" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-plus"></i> Tambah Baru
                                                </button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id[]" value="">
                                        
                                            <input type="text" name="name[]" placeholder="Nama" class="form-control form-control-sm mb-1" required autocomplete="off" value="">

                                        
                                            <input type="text" name="username[]" placeholder="Username" class="form-control form-control-sm mb-1" autocomplete="off" value="">

                                        
                                            <input type="email" name="email[]" placeholder="Email" class="form-control form-control-sm mb-1" autocomplete="off" value="">

                                       
                                            <input type="text" name="password[]" placeholder="Password" class="form-control form-control-sm mb-1" autocomplete="off" value="">

                                       
                                            <select name="gender[]" class="form-control form-control-sm mb-1">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                      
                                            <input type="text" name="role[]" class="form-control form-control-sm mb-1 d-none" readonly autocomplete="off"
                                            value="{{ $role == 'sadm' ? 'Superadmin' : ($role == 'cmu' ? 'Common User' : '') }}">
                                    
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary btn-block btn-simpan">
                                <i class="fa fa-save"></i> SIMPAN
                            </button>
                            

                        </form>
                    </div>
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

        $(document).ready(function() {

            // var table = $('#datatable').DataTable({
            //     responsive: false,
            //     lengthMenu: [10, 15, 25, 50, 100],
            //     pageLength: 50,
            //     paging: false,
            //     searching: true,
            //     ordering: true,
            //     info: false,
            //     scrollY: 200,
            //     scrollX: true,
            //     bScrollCollapse:true,
            //     fixedColumns:{
            //         leftColumns:4,
            //     },
            //     // rowCallback: function(row, data, index) {
            //     //     $('td:eq(0)', row).html(index + 1);
            //     // },
                
            //     dom: '<"py-1 px-1 d-flex justify-content-between align-items-center"l<"custom-html">f>rt<"bottom"ip><"clear">',
            //     initComplete: function() {
            //         $('#datatable thead th').removeClass('sorting sorting_asc sorting_desc');
            //         $("div.custom-html").html(`
            //             <h5><b>Admin</b></h5>
            //         `); 

            //         // $(document).ready(function() {
            //         //     $('#filter_jenis').val('All');
            //         //     $('#filter_jenis').trigger('change');
            //         // });
            //         // $('#filter_jenis').on('change', function() {
            //         //     var selectedJenis = $(this).val();
            //         //     if (selectedJenis === 'All') {
            //         //     table.column(5).search('').draw();
            //         //     } else {
            //         //         table.column(5).search(selectedJenis).draw();
            //         //     }
            //         // });

            //         this.api().columns().every(function () {
            //             var column = this;
            //             var title = column.footer().textContent.trim();
            //             if (title) { 
            //                 var input = document.createElement('input');
            //                 input.placeholder = 'Filter ' + title;
            //                 input.classList.add('form-control', 'form-control-sm');
            //                 column.footer().replaceChildren(input);
            //                 input.addEventListener('keyup', () => {
            //                     if (column.search() !== input.value) {
            //                         column.search(input.value).draw();
            //                     }
            //                 });
            //             }
            //         });

                   

            //     },
                    
            // });

            // table.on('order.dt search.dt', function () {
            //     table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            //         var pageInfo = table.page.info();
            //         var startIndex = pageInfo.start;  
            //         cell.innerHTML = startIndex + i + 1;
            //     });
            // }).draw(); 





       

                    
           

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

        
      
        

  

        
    


        ////fungsi clone row
        // $(document).ready(function() {
        //     $('#tambahrowpengguna').on('click', function() {

        //         // Baris baru yang ingin ditambahkan
        //         var newRow = `
        //             <tr>
        //                 <th class="p-0">
        //                 <input type="hidden" name="id[]" value="">
        //                 <input type="text" name="name[]" value="" class="form-control form-control-sm" autocomplete="off" required>
        //                 </th>
        //                 <td class="p-0"><input type="text" name="username[]" value="" class="form-control form-control-sm" autocomplete="off"></td>
        //                 <td class="p-0"><input type="email" name="email[]" value="" class="form-control form-control-sm" autocomplete="off"></td>
        //                 <td class="p-0">
        //                 <input type="text" name="password[]" class="form-control form-control-sm" autocomplete="off">
        //                 </td>
        //                 <td class="p-0">
        //                 <select name="gender[]" class="form-control form-control-sm">
        //                     <option value="">Pilih Jenis Kelamin</option>
        //                     <option value="Laki-Laki">Laki-Laki</option>
        //                     <option value="Perempuan">Perempuan</option>
        //                 </select>
        //                 </td>
        //                 <td class="p-0">
        //                     <input required readonly type="text" name="role[]" class="form-control form-control-sm" autocomplete="off" value="{{ $role == 'adm' ? 'Admin' : ($role == 'ptg' ? 'Petugas' : '') }}">
        //                 </td>
        //                 <td class="p-0" align="center">
        //                 <button class="btn btn-sm btn-danger removerowpengguna" type="button"><i class="fa fa-minus"></i></button>
        //                 </td>
        //             </tr>
        //         `;

        //         // Menambahkan baris baru ke dalam tabel
        //         $('#collapsePengguna').append(newRow);

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
        //     $(document).on('click', '.removerowpengguna, .hapusrow', function() {
        //         $(this).closest('tr').remove();
        //     });



          
        // });
        $(document).ready(function(){
            $('#tambahCardPengguna').on('click', function(){
                // Clone card pertama
                let newCard = $('.pengguna-card').first().clone();

                // Clear input values di clone
                newCard.find('input, select').each(function(){
                    if ($(this).attr('name') === 'role[]') {
                        // biarkan role tetap sesuai value $role di blade
                        $(this).val("{{ $role == 'adm' ? 'Admin' : ($role == 'ptg' ? 'Petugas' : '') }}");
                    } else {
                        $(this).val('');
                    }
                });

                // Append card baru ke container
                $('#containerPengguna').append(newCard);
            });

            // Hapus card
            $(document).on('click', '.hapusCard', function(){
                // Jangan hapus kalau cuma tersisa 1 card saja (optional)
                if($('.pengguna-card').length > 1){
                    $(this).closest('.pengguna-card').remove();
                } else {
                    alert('Minimal harus ada 1 pengguna.');
                }
            });
        });

        

        //
       




   

        

    




    });
   
</script>

