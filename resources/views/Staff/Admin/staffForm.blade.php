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
                            <div class="card-header">
                                <h3 class="card-title">Data Pegawai</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form
                                    action="{{ isset($staff) ? route('staff.update', $staff->id) : route('staff.store') }}"
                                    method="POST">
                                    {{ csrf_field() }}
                                    @if (isset($staff))
                                        {{ method_field('patch') }}
                                    @endif

                                    {{--  --}}
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Pegawai</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="name"
                                            value="{{ old('name', isset($staff) ? $staff->name : '') }}">
                                    </div>
                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{--  --}}

                                    {{--  --}}
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">No Telp Pegawai</label>
                                        <input type="number" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="phone_number"
                                            value="{{ old('phone_number', isset($staff) ? $staff->phone_number : '') }}"
                                            maxlength="15">
                                    </div>
                                    @error('phone_number')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{--  --}}

                                    {{--  --}}
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Alamat Pegawai</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="address"
                                            value="{{ old('address', isset($staff) ? $staff->address : '') }}">
                                    </div>
                                    @error('address')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{--  --}}

                                    {{--  --}}
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="username"
                                            value="{{ old('username', isset($staff) ? $staff->user->username : '') }}">
                                    </div>
                                    @error('username')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{--  --}}

                                    {{--  --}}
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Hak Akses</label>
                                        <select class="form-select form-control" id="inputGroupSelect03"
                                            aria-label="Example select with button addon" name="role">
                                            <option value="">Pilih</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role }}"
                                                    {{ old('role', $staff->user->role) == $role ? 'selected' : '' }}>
                                                    {{ $role }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('role')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{--  --}}

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                </form>
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
