<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/tailwind.css') }}">
</head>

<body>
    <div class="main m-auto h-screen p-4">

        <div class="flex flex-col">
            <!-- header -->
            <div class="header flex justify-between">
                <div class="icon">
                    <img src="{{ asset('asset/img/coffee 2.png') }}" alt="">
                </div>
                <a href="{{ url('/') }}">
                    <div class="checkout flex ml-32">
                        <i class="nav-icon fas fa-lock mr-1"></i>
                        Logout
                    </div>
                </a>
            </div>
            <!-- item -->
            <div class="item-main flex justify-between">
                <div class="text mt-5">
                    <div class="text-1 font-bold">Hayyu Coffe</div>
                    <div class="text-2">Punclut Lembang</div>
                </div>
                <div class="img">
                    <img src="{{ asset('asset/img/97f91f634de04058a299 1.png') }}" alt="">
                </div>
            </div>
            <div class="bg-abu ">
                <!-- list task -->
                <div class="font-bold">
                    List Pesanan
                </div>
                @foreach ($orders as $item)
                    <a href="{{ url('/petugas/checkout/' . $item->id) }}">
                        <div class="pembelian">
                            <div class=" active text-center font-bold text-xl flex justify-center mt-5">
                                {{ $item->id }}
                                <div class="spacer h-auto ml-5">
                                    &nbsp;
                                </div>
                                <div class="total ml-4">
                                    Rp. {{ number_format($item->total) }}
                                </div>
                                <div class="status ml-4">
                                    <img src="{{ asset('asset/img/ceklis.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

</body>

</html>
