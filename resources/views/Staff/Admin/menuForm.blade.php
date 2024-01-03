@extends('Staff/Admin/templates/template')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Daftar Menu</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Daftar Menu</li>
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
                                <form method="POST"
                                    action="{{ isset($menu) ? route('menu.update', $menu->id) : route('menu.store') }}">
                                    @csrf
                                    @if (isset($menu))
                                        @method('PUT')
                                    @endif

                                    {{--  --}}
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Menu</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name='name'
                                            value="{{ old('name', isset($menu) ? $menu->name : '') }}">
                                    </div>
                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{--  --}}
                                    {{--  --}}
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="description"
                                            value="{{ old('description', isset($menu) ? $menu->description : '') }}">
                                    </div>
                                    @error('description')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{--  --}}
                                    {{--  --}}
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Waktu Penyajian</label>
                                        <input type="number" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="serving_time"
                                            value="{{ old('serving_time', isset($menu) ? $menu->serving_time : '') }}">
                                    </div>
                                    @error('serving_time')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{--  --}}
                                    {{--  --}}
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Harga menu</label>
                                        <input type="number" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="price"
                                            value="{{ old('price', isset($menu) ? $menu->price : '') }}">
                                    </div>
                                    @error('price')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{--  --}}
                                    {{--  --}}

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">kategori menu</label>
                                        <select id="category" name="category" required class="form-select form-control">
                                            @foreach ($categories as $category)
                                                {{ old('category') == $category->name ? 'selected' : 'as' }}
                                                <option value="{{ $category->name }}"
                                                    {{ old('category', isset($menu) && $menu->category) == $category->name ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if (isset($menu))
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Status</label>
                                            <select id="category" name="status" required class="form-select form-control">
                                                @foreach ($statuses as $status)
                                                    <option value="{{ $status }}"
                                                        {{ old('status') == $status ? 'selected' : '' }}>
                                                        {{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('status')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @endif
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
@endsection
