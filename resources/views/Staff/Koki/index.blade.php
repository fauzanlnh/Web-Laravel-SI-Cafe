<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/tailwind.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
</head>

<body>
    <div class="main m-auto h-screen p-4">
        <div id="belanjaan" class='belanjaan'>
            <div class="modal-content mx-auto flex flex-col">
                <span id="tutup" class="text-right font-bold tutup">&times;</span>
                <p class="isi-modal overflow-auto font-bold text-center">Masak Selesai? </p>
                <div class="flex justify-center mt-3">
                    <button class="sudah font-bold text-white mx-2">Sudah</button>
                    <button id='belum' class="belum font-bold text-white mx-2">Belum</button>
                </div>
            </div>
        </div>
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
                <!-- sudah  -->
                @foreach ($orders as $order)
                    @if ($order->order_detail_status == 'cook')
                        <form action="{{ url('/koki/process/send-to-customer/' . $order->id) }}" method="POST"
                            onsubmit="return confirm('Sajikan Kepada Customer?');">
                        @else
                            <form action="{{ url('/koki/process/cooking/' . $order->id) }}" method="POST"
                                onsubmit="return confirm('Proses Pesanan untuk dimasak?');">
                    @endif
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <input type="hidden" value='{{ $order->id }}' name='id'>
                    <button>
                        <div class="pembelian">
                            @if ($order->order_detail_status == 'cook')
                                <div class="active text-center font-bold text-xl flex justify-center mt-5">
                                @else
                                    <div class="deactive text-center font-bold text-xl flex justify-center mt-5">
                            @endif
                            {{ $order->no_meja }}
                            @if ($order->order_detail_status == 'cook')
                                <div class="spacer h-auto ml-5">&nbsp;</div>
                            @else
                                <div class="spacerde h-auto ml-5">&nbsp;</div>
                            @endif

                            <div class="ml-4">
                                {{ $order->menu->name }}
                            </div>
                            <div class='total ml-4'>
                                {{ $order->qty }}
                            </div>
                            <div class="status ml-4">
                                @if ($order->order_detail_status == 'cook')
                                    <img src="{{ asset('asset/img/ceklis.png') }}" alt=""class="mt">
                                @else
                                    <img src="{{ asset('asset/img/close.png') }}" alt=""class="mt">
                                @endif
                            </div>
                        </div>

            </div>
            <button>
                </form>
                @endforeach


        </div>
    </div>
    </div>

</body>
<script>
    /* const belanjaan = document.getElementById('belanjaan')
    const beli = document.getElementsByClassName('pembelian')
    const tutup = document.getElementById('tutup')
    tutup.onclick = function () {
        belanjaan.style.display = "none"
    }
    for (let i = 0; i <= beli.length; i++) {
        beli[i].addEventListener('click', () => {
            belanjaan.style.display = "block"
        })
    }*/
</script>

</html>
