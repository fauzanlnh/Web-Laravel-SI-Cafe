@extends('customer.layouts.template')
@section('main-content')
    <div class="code text-3xl text-center w-60 items-center mx-auto my-2 font-extrabold">
        {{ $dataOrder->id }}
    </div>
    <div class="cart flex text-white justify-evenly mt-2 mb-2">Daftar Pesanan </div>
    <div class="item justify-between overflow-auto h-96">
        <?php $total = 0; ?>
        @foreach ($dataOrder->detailOrder as $detailOrder)
            <?php
            if ($detailOrder->order_detail_status == 'cook' || $detailOrder->order_detail_status == 'served') {
                $total += $detailOrder->menu->price * $detailOrder->qty;
            }
            ?>
            <!-- item1 -->
            @if ($detailOrder->order_detail_status == 'cart' || $detailOrder->order_detail_status == 'pending')
                <div class="rekomend flex items-center w-full mt-3">
                    <div class="bag-1">
                        <img src="{{ asset('/asset/img/sensasi-ngopi-di-sinia-coffe 1.png') }}" alt="" class="gambar"
                            width="100px">
                    </div>
                    <div class="bag-2 w-full d-flex flex-row">
                        <div class="">
                            <span class="font-bold text-white font-4xl">{{ $detailOrder->menu->name }}</span><br>
                            <p class="deskripsi mt-2"> Qty : {{ $detailOrder->qty }}</p>
                            <p class="deskripsi mt-2">Harga : Rp. {{ number_format($detailOrder->menu->price) }}</p>
                            <div class="flex  mt-2">
                                <span class="harga">{{ $detailOrder->order_detail_status }}</span>
                            </div>
                        </div>
                        <div class="align-self-center justify-content-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin membatalkan pesanan?');"
                                action="{{ url('/customer/' . $dataOrder->table_number . '/order/detail/delete/' . $detailOrder->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class='hapus text-white mt-1' type="submit">x</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            @if ($detailOrder->order_detail_status == 'cook' || $detailOrder->order_detail_status == 'served')
                <div class="rekomend flex items-center w-full mt-3">
                    <div class="bag-1">
                        <img src="{{ asset('/asset/img/sensasi-ngopi-di-sinia-coffe 1.png') }}" alt=""
                            class="gambar" width="100px">
                    </div>
                    <div class="bag-2 w-full">
                        <span class="font-bold text-white font-4xl">{{ $detailOrder->menu->name }}</span><br>
                        <p class="deskripsi mt-2"> Qty : {{ $detailOrder->qty }}</p>
                        <p class="deskripsi mt-2">Harga : Rp. {{ number_format($detailOrder->menu->price) }}</p>
                        <div class="flex  mt-2">
                            <span class="harga">{{ $detailOrder->order_detail_status }}</span>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <a class="cart flex text-white justify-evenly mt-4">Total Harga (served) : Rp. {{ number_format($total) }}</a>
    <a href="{{ url('customer/' . $dataOrder->table_number . '/order/invoice') }}"
        class="cart flex text-white justify-evenly mt-4">Lakukan Pembayaran </a>
@endsection
