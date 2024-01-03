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
                {{-- Food --}}
                <hr>
                <div class='d-flex justify-content-between align-items-center'>
                    <h3>Menu Makanan</h3>
                    <a href="/admin/menu/create" class="btn btn-success">Tambah Data Menu</a>
                </div>
                <div class="row mt-4">
                    @foreach ($menus as $menu)
                        @if ($menu->category == 'Food')
                            <div class="col">
                                <!-- Card  -->
                                <div class="card" style="width: 20rem; ">
                                    <img class="card-img-top"
                                        src="{{ asset('asset/img/sensasi-ngopi-di-sinia-coffe 2.png') }}"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $menu->name }}</h5>
                                        <p class="card-text"
                                            style="display: -webkit-box; -webkit-box-orient: vertical;
                                        overflow: hidden; text-overflow: ellipsis; -webkit-line-clamp: 3; ">

                                            {{ $menu->description }}</p>
                                        <div class="d-flex justify-content-end ">
                                            <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning">Ubah</a>
                                            <form method="POST" action="{{ route('menu.destroy', $menu->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ml-2">Hapus</button>

                                            </form>

                                        </div>

                                    </div>
                                </div>
                                <!-- /.Card  -->
                            </div>
                        @endif
                    @endforeach
                </div>
                {{-- Food --}}
                <hr>
                <h3>Menu Minuman</h3>
                {{-- Drinks --}}
                <div class="row mt-4">
                    @foreach ($menus as $menu)
                        @if ($menu->category == 'Drink')
                            <div class="col">
                                <!-- Card  -->
                                <div class="card" style="width: 20rem; ">
                                    <img class="card-img-top"
                                        src="{{ asset('asset/img/sensasi-ngopi-di-sinia-coffe 2.png') }}"
                                        alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $menu->name }}</h5>
                                        <p class="card-text"
                                            style="display: -webkit-box; -webkit-box-orient: vertical;
                                        overflow: hidden; text-overflow: ellipsis; -webkit-line-clamp: 3; ">

                                            {{ $menu->description }}</p>
                                        <div class="d-flex justify-content-end ">
                                            <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning">Ubah</a>
                                            <a href="{{ route('menu.destroy', $menu->id) }}"
                                                class="btn btn-danger
                                                ml-2">Hapus</a>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.Card  -->
                            </div>
                            {{-- Col --}}
                        @endif
                    @endforeach
                </div>
                {{-- Drinks --}}
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
