@extends('Staff/Admin/templates/template')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">Data Pegawai</h3>
                                <a href="/admin/staff/create" class="btn btn-success ml-auto">Tambah Data Pegawai</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Kode Pegawai</th>
                                            <th>Nama Pegawai</th>
                                            <th>No Telp Pegawai</th>
                                            <th>Alamat Pegawai</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff as $staf)
                                            <tr>
                                                <td class="text-center">{{ $staf->id }}</td>
                                                <td>{{ $staf->name }}</td>
                                                <td>{{ $staf->phone_number }}</td>
                                                <td>{{ $staf->address }}</td>
                                                <td style="text-align:center;">
                                                    <div>
                                                        <div class="row justify-center">
                                                            <div class="col col-6">
                                                                <a
                                                                    class="btn btn-warning"href="{{ route('staff.edit', $staf->id) }}"><i
                                                                        value="Edit">Ubah</a>
                                                            </div>
                                                            <div class="col col-6">
                                                                <a value='delete'>
                                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                        action="{{ route('staff.destroy', $staf->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger"><i
                                                                                value="Delete">Hapus</button>
                                                                    </form>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Kode Pegawai</th>
                                            <th>Nama Pegawai</th>
                                            <th>No Telp Pegawai</th>
                                            <th>Alamat Pegawai</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
