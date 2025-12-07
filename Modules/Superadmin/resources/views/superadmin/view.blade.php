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
            <div class="">
                <div class="d-flex justify-content-between">
                    <h4 class="d-flex align-items-center">Halo, {{ Auth::user()->name }}!</h4>
                    <center class="my-1"><img src="{{ asset('images/profile_pictures/' . Auth::user()->pp) }}" class="img-circle elevation-2" alt="{{Auth::user()->pp}}" width="50" height="50"></center>
                </div>
            </div>
        </div>
    </div>
    <section class="content p-0 m-0">
        <div class="container-fluid p-0 m-0">
            <div class="row card p-0 m-0">
            <div class="card-body">
                    <center><img src="{{ asset('images/profile_pictures/' . Auth::user()->pp) }}" class="img-circle elevation-2" alt="{{Auth::user()->pp}}" width="100" height="100"></center>
                    <center class="py-2">
                        <span style="color:blue; text-decoration:none; cursor:pointer;" data-toggle="modal" data-target="#uploadModal">
                            Edit
                        </span>
                    </center>
                    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="POST" action="{{ route('profile.upload') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content" style="border-radius:0;">
                                    <div class="modal-header bg-primary p-1 m-0">
                                    <h5 class="modal-title" id="uploadModalLabel">Edit Foto Profil</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body p-1 m-0">
                                    <div class="custom-file">
                                        <span class="text-danger"><i>Max ukuran file: 10MB</i></span>
                                        <input required type="hidden" name="id" readonly value="{{Auth::user()->id;}}">
                                        <input required type="file" accept=".png,.jpg,.jpeg,.heic" class="" id="fileInput" name="pp">
                                    </div>
                                    </div>
                                    <div class="modal-footer p-1 m-0">
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-upload"></i> Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <center>
                        <button class="btn btn-outline-light text-dark btn-block mb-1 d-flex justify-content-between" type="button" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="false" aria-controls="collapseExample">
                            <i style="visibility:hidden;" class="fa fa-chevron-left"></i> <b><i class="fa fa-user"></i> {{ Auth::user()->name }}</b> <i class="fa fa-chevron-right mt-1"></i>
                        </button>
                        <div class="collapse" id="collapseProfile">
                            <form method="POST" action="{{route('profile.update')}}" id="formUpdateProfile">
                                @csrf
                                <div class="card card-body">

                                        <table class="table table-sm nowrap col-lg-4 offset-lg-4">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Username</th>
                                                    <td>
                                                        <div class="input-group">
                                                            <input readonly type="hidden" name="id" value="{{ Auth::user()->id }}" required>
                                                            <input readonly type="text" name="username" class="inputusername form-control form-control-sm pl-0 pt-0 pr-0 pb-0 m-0" style="font-size:17px; background-color:#ffffff; border:none; color:black;" value="{{ Auth::user()->username }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email</th>
                                                    <td>
                                                        <div class="input-group">
                                                            <input readonly type="text" name="email" class="inputemail form-control form-control-sm pl-0 pt-0 pr-0 pb-0 m-0" style="font-size:17px; background-color:#ffffff; border:none; color:black;" value="{{ Auth::user()->email }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Role</th>
                                                    <td>{{ Auth::user()->role }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Gender</th>
                                                    <td>{{ Auth::user()->gender }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-sm btn-danger btnbatalupdate d-none"><i class="fa fa-times"></i> Batal</button>
                                            <button type="submit" class="btn btn-sm btn-success btnupdateprofile d-none"><i class="fa fa-save"></i> Update Profile</button>
                                        </div>
                                        
                                        


                                </div>
                            </form>
                            <span style="color:blue; cursor:pointer;" data-toggle="collapse" data-target="#collapseGantiPW">
                                Ganti Password
                            </span>
                            <div class="collapse my-2" id="collapseGantiPW">
                                <div class="card p-2 col-lg-4" style="border-radius:0;">
                                    <form method="POST" action="{{ route('profile.change') }}" id="formGantiPassword">
                                        @csrf
                                        <input required type="hidden" name="id" readonly value="{{ Auth::user()->id }}">
                                        
                                        <div class="form-group mb-2">
                                            <input required type="text" 
                                                class="form-control form-control-sm" 
                                                placeholder="Masukkan password baru Anda di sini" 
                                                autocomplete="off" 
                                                name="password">
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="collapse" data-target="#collapseGantiPW">
                                                <i class="fa fa-times"></i> Batal
                                            </button>
                                            <button type="submit" class="btn btn-sm btn-success btngantipassword">
                                                <i class="fa fa-save"></i> Update Password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </center>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-danger btn-block mt-4" type="submit" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-sign-out-alt"></i> Log Out
                        </button>
                    </form>
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

        //fungsi penampilan update dan batal
        $(document).ready(function() {
           
            // klik input username
            $('input[name="username"]').click(function() {
                $(this).prop('readonly', false);
                $(this).css('border', '0.2px solid gray');
                $('.btnupdateprofile').removeClass('d-none');
                $('.btnbatalupdate').removeClass('d-none');
            });

            // klik input email
            $('input[name="email"]').click(function() {
                $(this).prop('readonly', false);
                $(this).css('border', '0.2px solid gray');
                $('.btnupdateprofile').removeClass('d-none');
                $('.btnbatalupdate').removeClass('d-none');
            });

            // klik batalupdate
            $('.btnbatalupdate').click(function(){
                $('input[name="username"],input[name="email"]').prop('readonly', true);
                $('input[name="username"],input[name="email"]').css('border', 'none');
                $('.btnupdateprofile').addClass('d-none');
                $('.btnbatalupdate').addClass('d-none');
            });
            
        });

        //fungsi sweetalert update profile
        $(document).ready(function() {
            $('.btnupdateprofile').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Update Profil?',
                    text: "Apakah kamu yakin ingin menyimpan perubahan profil ini?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, simpan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#formUpdateProfile').submit(); 
                    }
                });
            });
        });

        //fungsi sweetalert ganti password
        $(document).ready(function() {
            $('.btngantipassword').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Ganti Password?',
                    text: "Apakah kamu yakin ingin mengganti Password yang baru ini?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Ganti!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#formGantiPassword').submit(); 
                    }
                });
            });
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