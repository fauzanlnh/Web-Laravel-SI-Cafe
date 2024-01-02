<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/tailwind.css') }}">
    @yield('css')
</head>

<body>
    <div class="main m-auto h-screen p-4">
        @if ($dataOrder)
            <div id="myModal" class="modal">
                <div class="modal-content mx-auto flex flex-col">
                    <span id="close" class="text-right font-bold tutup">&times;</span>
                    <p class="isi-modal overflow-auto h-10">List Pesanan</p>
                    <?php $totalOrderCart = 0; ?>
                    @foreach ($dataOrder->detailOrder as $detailOrder)
                        @if ($detailOrder->order_detail_status == 'cart')
                            <?php $totalOrderCart += 1; ?>
                            <div class="cart flex justify-evenly mb-3">
                                <div class='ml-4'>
                                    <div class='text-white font-bold '>{{ $detailOrder->menu->name }}</div>
                                    <div class='text-white text-sm mt-2'> Qty : {{ $detailOrder->qty }}</div>
                                    <div class='text-white text-sm mt-2'> Harga : Rp.
                                        {{ number_format($detailOrder->menu->price) }}</div>
                                </div>
                                <div class='flex flex-col justify-around'>
                                    <form onsubmit="return confirm('Apakah Anda Yakin membatalkan pesanan?');"
                                        action="{{ url('customer/' . $dataOrder->table_number . '/order/detail/delete/' . $detailOrder->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class='hapus text-white mt-1' type="submit">x</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @if ($totalOrderCart > 0)
                        <form onsubmit="return confirm('Proses pesanan?');"
                            action="{{ url('customer/' . $dataOrder->table_number . '/order/detail/process/cart') }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button class='checkout font-3xl h-full font-bold' type="submit"> Pesan </button>
                        </form>
                    @endif
                </div>
            </div>
        @endif
        <div class="flex flex-col">
            <header>
                @include('customer.layouts.header')
            </header>
            <main>
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
                @yield('main-content')
        </div>
    </div>
</body>
<script src="{{ asset('asset/js/main.js') }}"></script>

</html>
