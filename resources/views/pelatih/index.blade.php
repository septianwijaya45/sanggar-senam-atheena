@extends('layouts.app')
@section('title', 'Pelatih')

@section('content')

@if(Session::has('alert'))
  @if(Session::get('sweetalert')=='success')
    <div class="swalDefaultSuccess">
    </div>
  @elseif(Session::get('sweetalert')=='error')
    <div class="swalDefaultError">
    </div>
    @elseif(Session::get('sweetalert')=='warning')
    <div class="swalDefaultWarning">
    </div>
  @endif
@endif
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Master Pelatih</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pelatih</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Data Pelatih</h5>

                                <div class="card-tools">
                                    <a class="btn btn-success btn-sm" href="{{route('add.pelatih')}}">
                                        <i class="fas fa-plus"></i> Tambah Data
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="tbl_kain_potongan_wrapper"
                                    class="dataTables_wrapper dt-bootstrap4 table-responsive text-nowrap">
                                    <table id="datatable" class="table table-bordered table-striped dataTable"
                                        aria-describedby="tbl_kain_potongan" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th width="5%" style="text-align: center;">ID</th>
                                                <th>Nama Pelatih</th>
                                                <th>Jenis Pelatih</th>
                                                <th>Email</th>
                                                <th>Telepon</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pelatih as $data)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$data->nama_pelatih}}</td>
                                                <td>{{$data->jenis}}</td>
                                                <td>{{$data->email}}</td>
                                                <td>{{$data->tlp_pelatih}}</td>
                                                <td>
                                                    <a href="{{route('edit.pelatih', $data->id)}}"><button class="btn btn-warning btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></button></a>
                                                    <button class="btn btn-danger btn-sm " onClick="confirmDelete({{$data->id}})"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- ./card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('footer')
<script type="text/javascript">
    function confirmDelete(id) {
        swal({
            title: "Anda Yakin?",
            text: "Hapus Data Pelatih? Semua Data yang Terkait Juga Terhapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                    url: "Pelatih/Destroy/"+id,
                    method: 'DELETE',
                    success: function (results) {
                        swal("Berhasil!", "Data Berhasil Dihapus!", "success");
                        $('.datatables').DataTable().ajax.reload();
                        setInterval(function(){ 
                            window.location.reload();
                    }, 1000);
                    },
                    error: function (results) {
                        swal("GAGAL!", "Gagal Menghapus Data!", "error");
                    }
                });
            } else {
                swal("Batal Menghapus!");
            }
        });
    }
</script>
@endsection