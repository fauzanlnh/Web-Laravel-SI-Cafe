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
                                <h3 class="card-title">Data Transaksi</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Id Pemesanan</th>
                                            <th>Tanggal</th>
                                            <th>Detail Order</th>
                                            <th>Sub Total</th>
                                            <th>Total Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td class="text-center">{{ $order->id }}</td>
                                                <td class="text-center">{{ $order->date }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($order->detailOrder as $detailOrder)
                                                            <li style="margin-bottom: 10px;">
                                                                <div class="row">
                                                                    <div class="col col-4">
                                                                        {{ $detailOrder->menu->name }}
                                                                    </div>
                                                                    <div class="col col-3">
                                                                        Rp. {{ number_format($detailOrder->price) }}
                                                                    </div>
                                                                    <div class="col col-2">
                                                                        {{ number_format($detailOrder->qty) }}
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        @foreach ($order->detailOrder as $detailOrder)
                                                            <li class="margin-bottom: 10px">
                                                                <div class="row">
                                                                    <div class="col">Rp.
                                                                        {{ number_format($detailOrder->detail_total) }}
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td class="text-center">
                                                    Rp. {{ number_format($order->total_purchases) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-center">
                                            <th>Id Pemesanan</th>
                                            <th>Tanggal</th>
                                            <th>Detail Order</th>
                                            <th>Sub Total</th>
                                            <th>Total Pembayaran</th>
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
