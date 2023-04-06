@extends('layouts.app', ['title' => 'Pegawai'])

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Menu</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                        <li class="breadcrumb-item active">Menu</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Pegawai</h4>
                    <form class="custom-validation" id="permForm" name="permForm" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="hidden" name="id" id="id">
                                    <label for="validationCustom01" class="form-label">Nama</label>
                                    <input parsley-type="text" type="text" name="nama" class="form-control"
                                        id="nama" placeholder="Nama Pegawai" value="{{ old('nama') }}">

                                    <span class="text-danger error-text nama_error"></span>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status Kontrak</label>
                                    <select class="form-control select2" name="status_kontrak" id="status_kontrak">
                                        <option>-- Select --</option>        
                                        @foreach ($status_kontrak as $item)                                            
                                            <option value="{{ $item->jenis_kontrak }}">{{ $item->jenis_kontrak }}</option>
                                        @endforeach
                                                                             
                                    </select>
                                  
                                    <span class="text-danger error-text status_kontrak_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <label class="form-label">Jabatan</label>
                                    <select class="form-control select2" name="jabatan" id="jabatan">
                                        <option>-- Select --</option>        
                                        @foreach ($jabatan as $item)                                            
                                            <option value="{{ $item->nama_jabatan }}">{{ $item->nama_jabatan }}</option>
                                        @endforeach
                                                                             
                                    </select>
                                    <span class="text-danger error-text jabatan_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Email</label>
                                    <input parsley-type="text" type="text" name="email" class="form-control"
                                        id="email" placeholder="Email" value="{{ old('email') }}">

                                    <span class="text-danger error-text email_error"></span>
                                </div>
                            </div>
                           
                        </div>
                       

                        <div>
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a href="{{ URL::previous() }}" type="button" class="btn btn-danger" type="submit">Back</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">List Pegawai</h4>

                    <table id="menutable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th width="20%">Nama</th>
                                <th width="20%">Jabatan</th>
                                <th width="20%">Status Kontrak</th>
                                <th width="20%">Email</th>                              
                                <th width="10%">Aksi</th>

                            </tr>
                        </thead>


                        <tbody>

                        </tbody>
                    </table>

                </div>

            </div>
        </div> <!-- end col -->



    </div>



</div>


@endsection

@section('script')
<script>
    $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function() {
                show_data_menu()
            });


            function show_data_menu() {
                $('#menutable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{!! url()->current() !!}'
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'jabatan',
                            name: 'jabatan'
                        },
                        {
                            data: 'status_kontrak',
                            name: 'status_kontrak'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                       
                       
                        {
                            data: 'action',
                            name: 'action'
                        },

                    ]
                })
            }

            //ADD AND STORE NEW MENUS
            $('#permForm').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                console.log(form);
                $.ajax({
                    url: "{{ route('account.pegawai.store') }}",
                    // url:$(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    // data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },

                    success: function(data) {
                     
                        if (data.code == 0) {                    
                            $.each(data.error, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);

                            });
                        } else {
                            $(form)[0].reset();
                            $("#jabatan").val('').trigger('change');
                            $("#status_kontrak").val('').trigger('change');
                            $("#permForm input:hidden").val('').trigger('change');
                            $('#menutable').DataTable().ajax.reload(null, false);
                            toastr.success(data.msg);
                        }
                    }
                });
            });

            $('body').on('click', '#edit', function() {
                var id = $(this).data('id');
                var form = this;
              
                //alert(id);
                $.get("{{ route('account.pegawai.index') }}" + '/' + id + '/edit', function(data) {
                    
                    $('#id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#jabatan').val(data.jabatan).trigger('change');
                    $('#status_kontrak').val(data.status_kontrak).trigger('change');
                    $('#email').val(data.email);
                    
                    
                })
                // $(form)[0].reset();
            });
         
         

             //DELETE MENUS RECORD
             $(document).on('click', '#delete', function() {
                var id = $(this).data('id');

                swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this Pegawai ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function(result) {
                   
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('account.pegawai.store') }}" + '/' + id,

                            success: function(data) {

                                if (data.code == 1) {
                                    toastr.success(data.msg);
                                    $('#menutable').DataTable().ajax.reload(null,
                                    false);
                                }
                            }
                        });
                    }  
                });

            });


        });
</script>
@endsection