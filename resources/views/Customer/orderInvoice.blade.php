@extends('customer.layouts.template')
@section('main-content')
    <div class="code text-3xl text-center w-60 items-center mx-auto my-2 font-extrabold">
        {{ $dataOrder->id }}
    </div>
    <div class="text-sm text-center mt-2">
        Tunjukan Invoice Ini
    </div>
    <div class="list-pesanan  overflow-auto mt-2">
        @if ($dataOrder->detailOrder)
            @php $total=0; @endphp
            @foreach ($dataOrder->detailOrder as $detailOrder)
                @if ($detailOrder->order_detail_status == 'served')
                    @php $total+=$detailOrder->detail_total; @endphp
                    <div class="rekomend flex items-center w-full mt-4">
                        <div class="bag-1">
                            <img src="{{ asset('/asset/img/sensasi-ngopi-di-sinia-coffe 1.png') }}" alt=""
                                class="gambar" width="100px">
                        </div>
                        <div class="bag-2 w-full">
                            <span class="font-bold text-white font-4xl">{{ $detailOrder->menu->name }}</span><br>
                            <p class="deskripsi mt-2"> Qty : {{ $detailOrder->qty }} Harga :
                                {{ number_format($detailOrder->price) }}</p>
                            <div class="flex  mt-2"> <span class="harga">Subtotal :
                                    Rp. {{ number_format($detailOrder->detail_total) }}</span></div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
        <!--<img src="{{ asset('asset/img/pemesanan.png') }}" alt="" class="mx-auto">!-->
    </div>
    <a class="cart flex text-white justify-evenly mt-4">Total Harga : Rp. {{ number_format($total) }}</a>
@endsection
