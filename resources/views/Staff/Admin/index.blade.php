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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $transaksi[0]->total_transaksi }}</h3>
                                <p>Transaksi</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-book"></i>
                            </div>
                            <a href="{{ url('admin/transaksi/') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>Rp. {{ number_format($transaksi[0]->total_pemasukan) }} </h3>
                                <p>Total Pemasukan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-book"></i>
                            </div>
                            <a href="{{ url('admin/transaksi/') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $menu[0]->total_menu }} </h3>
                                <p>Menu</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-book"></i>
                            </div>
                            <a href="{{ url('admin/menu/') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $pegawai[0]->total_pegawai }} </h3>
                                <p>Pegawai</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href=" {{ url('admin/staff/') }} " class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- Kotak bawah -->
                    <div class="col-lg-6 col-6">
                        <!-- BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Penjualan Bulanan</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart"
                                        style="min-height: 250px; height: 750px; max-height: 2350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-lg-6 col-6">

                        <!-- solid sales graph -->
                        <div class="card bg-gradient-info">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-th mr-1"></i>
                                    Pendapatan Bulanan
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas class="chart" id="line-chart"
                                    style="min-height: 250px; height: 750px; max-height: 1050px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </div>



                    <!-- ./col -->

                </div>
            </div><!-- /.container-fluid -->

        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <?php
    $bulan = [];
    $penjualan_minuman = [];
    $penjualan_makanan = [];
    $pendapatan_perbulan = [];
    foreach ($barmin as $bb):
        array_push($penjualan_minuman, $bb->jumlah_minuman);
        array_push($bulan, $bb->namabulan);
    endforeach;
    foreach ($barman as $bb):
        array_push($penjualan_makanan, $bb->jumlah_minuman);
    endforeach;
    foreach ($pendapatan as $bb):
        array_push($pendapatan_perbulan, $bb->pendapatan_perbulan);
    endforeach;
    ?>
    <script>
        //Chart 1
        var areaChartData = {
            labels: <?php echo json_encode($bulan); ?>, //['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                    label: 'Minuman',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: <?php echo json_encode($penjualan_minuman); ?>
                    //[28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: 'Makanan',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: <?php echo json_encode($penjualan_makanan); ?> //[65, 59, 80, 81, 56, 55, 40]
                },
            ]
        }
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = jQuery.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0
        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }
        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })

        //Chart 2
        var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d');
        //$('#revenue-chart').get(0).getContext('2d');

        var salesGraphChartData = {
            labels: <?php echo json_encode($bulan); ?>, // ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Pendapatan Sebesar',
                fill: false,
                borderWidth: 2,
                lineTension: 0,
                spanGaps: true,
                borderColor: '#efefef',
                pointRadius: 3,
                pointHoverRadius: 7,
                pointColor: '#efefef',
                pointBackgroundColor: '#efefef',
                data: <?php echo json_encode($pendapatan_perbulan); ?>
                //[2666, 2778, 4912, 3767, 6810, 5670, 4820, 15073, 10687, 8432]
            }]
        }

        var salesGraphChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false,
            },
            scales: {
                xAxes: [{
                    ticks: {
                        fontColor: '#efefef',
                    },
                    gridLines: {
                        display: false,
                        color: '#efefef',
                        drawBorder: false,
                    }
                }],
                yAxes: [{
                    ticks: {
                        stepSize: 5000,
                        fontColor: '#efefef',
                    },
                    gridLines: {
                        display: true,
                        color: '#efefef',
                        drawBorder: false,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        var salesGraphChart = new Chart(salesGraphChartCanvas, {
            type: 'line',
            data: salesGraphChartData,
            options: salesGraphChartOptions
        })
    </script>
    <script src="{{ asset('asset/adminlte/plugins/sparklines/sparkline.js') }}"></script>
@endsection
