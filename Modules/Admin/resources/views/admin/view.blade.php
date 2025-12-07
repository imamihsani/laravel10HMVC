<style>
    input,textarea,select{
        border-radius: 0px !important;
    }
    .tooltip { 
        pointer-events: none;
    }
    .select2-container--bootstrap4{
        width:66.5% !important;
    }
</style>
@extends('admin::layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="container-header">
        <div class="container-fluid">
            <div class="">
                <div class="d-flex justify-content-between">
                    <h4 class="d-flex align-items-center">Halo, Admin {{ Auth::user()->name }}!</h4>
                    <center class="my-1 dropdown">
                        <img src="{{ asset('images/profile_pictures/' . Auth::user()->pp) }}" class="img-circle elevation-2 dropdown-toggle" type="button" data-toggle="dropdown" alt="{{Auth::user()->pp}}" width="50" height="50">
                        <div class="dropdown-menu">
                            <a class="dropdown-item" type="button" href="{{ url('profile/profile') }}"><i class="fa fa-user"></i> Profile</a>
                            <form method="POST" class="p-0 m-0" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link btn-sm dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                            </form>
                        </div>
                    </center> 
                </div>
            </div>
        </div>
    </div>
    <section class="content p-0 m-0">
        <div class="container-fluid p-0 m-0">
            <div class="card p-0 m-0">
                <div class="card-body p-0 m-1">
                    lorem ipsum   
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        //select2
        // $('.select2petugas').select2({
        //     placeholder: "Pilih Petugas",
        //     width: 'resolve',
        //     // dropdownAutoWidth: true,
        //     theme: 'bootstrap4',
        //     dropdownParent: '#modalTambahPenugasan'
        // });

        // //fungsi tooltip
        // $(document).ready(function() {
        //     $('[data-toggle="tooltip"]').tooltip();
        //     $(function () {
        //         $('[title]').tooltip();
        //         $('[data-toggle="modal"]').on('mouseenter', function() {
        //             $(this).tooltip('show');
        //         }).on('mouseleave', function() {
        //             $(this).tooltip('hide');
        //         });
        //     });
        // });

        // //fungsi validasi tanggal
        // const today = new Date();
        // const yyyy = today.getFullYear();
        // const mm = String(today.getMonth() + 1).padStart(2, '0');
        // const dd = String(today.getDate()).padStart(2, '0');
        // const minDate = `${yyyy}-${mm}-${dd}`;
        // $('.tanggal').attr('min', minDate);
        // $('.tanggal').on('blur', function() {
        //     const val = $(this).val();
        //     if (val.length < 10) return;
        //     if (val < minDate) {
        //         $('.alertmodal').html('Tanggal tidak boleh kurang dari hari ini!');
        //         $('.alertmodal').removeClass('d-none');
        //         setTimeout(function(){
        //             $('.alertmodal').addClass('d-none');
        //         },2000);
        //         $(this).val('');
        //     }
        // });

        // //fungsi penampilan update dan batal
        // $(document).ready(function() {
           
        //     // klik input username
        //     $('input[name="username"]').click(function() {
        //         $(this).prop('readonly', false);
        //         $(this).css('border', '0.2px solid gray');
        //         $('.btnupdateprofile').removeClass('d-none');
        //         $('.btnbatalupdate').removeClass('d-none');
        //     });

        //     // klik input email
        //     $('input[name="email"]').click(function() {
        //         $(this).prop('readonly', false);
        //         $(this).css('border', '0.2px solid gray');
        //         $('.btnupdateprofile').removeClass('d-none');
        //         $('.btnbatalupdate').removeClass('d-none');
        //     });

        //     // klik batalupdate
        //     $('.btnbatalupdate').click(function(){
        //         $('input[name="username"],input[name="email"]').prop('readonly', true);
        //         $('input[name="username"],input[name="email"]').css('border', 'none');
        //         $('.btnupdateprofile').addClass('d-none');
        //         $('.btnbatalupdate').addClass('d-none');
        //     });
            
        // });

        // //fungsi sweetalert update profile
        // $(document).ready(function() {
        //     $('.btnupdateprofile').on('click', function(e) {
        //         e.preventDefault();
        //         Swal.fire({
        //             title: 'Update Profil?',
        //             text: "Apakah kamu yakin ingin menyimpan perubahan profil ini?",
        //             icon: 'question',
        //             showCancelButton: true,
        //             confirmButtonColor: '#3085d6',
        //             cancelButtonColor: '#d33',
        //             confirmButtonText: 'Ya, simpan!',
        //             cancelButtonText: 'Batal'
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 $('#formUpdateProfile').submit(); 
        //             }
        //         });
        //     });
        // });

        // //fungsi sweetalert ganti password
        // $(document).ready(function() {
        //     $('.btngantipassword').on('click', function(e) {
        //         e.preventDefault();
        //         Swal.fire({
        //             title: 'Ganti Password?',
        //             text: "Apakah kamu yakin ingin mengganti Password yang baru ini?",
        //             icon: 'question',
        //             showCancelButton: true,
        //             confirmButtonColor: '#3085d6',
        //             cancelButtonColor: '#d33',
        //             confirmButtonText: 'Ya, Ganti!',
        //             cancelButtonText: 'Batal'
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 $('#formGantiPassword').submit(); 
        //             }
        //         });
        //     });
        // });

        // //fungsi sweetalert tambah tugas
        // $(document).ready(function() {
        //     $('.tomboltambahtugas').on('click', function(e) {
        //         e.preventDefault();
        //         Swal.fire({
        //             title: 'Tambah Penugasan Ini?',
        //             text: "Apakah kamu yakin ingin menambah penugasan ini?",
        //             icon: 'question',
        //             showCancelButton: true,
        //             confirmButtonColor: '#3085d6',
        //             cancelButtonColor: '#d33',
        //             confirmButtonText: 'Ya, tambahkan!',
        //             cancelButtonText: 'Batal'
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 $('#tambahPenugasan').submit(); 
        //             }
        //         });
        //     });
        // });


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