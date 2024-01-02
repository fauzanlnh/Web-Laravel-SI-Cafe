@extends('customer.layouts.template')
@section('main-content')
    <!-- kategori -->
    <div class="kategori ml-4 mt-1">
        Kategori
    </div>
    <!-- pilihan kategori -->
    <div class="item flex justify-between">
        <a href="{{ url('customer/' . $dataOrder->table_number . '/order/drink') }}">
            <div class="kategori-1 flex flex-col items-center">
                <img src="{{ asset('asset/img/coffee 1.svg') }}" alt="">
                Minuman
            </div>
        </a>
        <a href="{{ url('customer/' . $dataOrder->table_number . '/order/food') }}">
            <div class="kategori-1 flex flex-col items-center">
                <img src="{{ asset('asset/img/restaurant.svg') }}" alt="" class="mt-4">
                Makanan
            </div>
        </a>
    </div>
    <div class="kategori ml-4 mt-1">
        Silahkan Pilih Menu
    </div>
    <!-- rekomendasi -->
    <div class="item justify-between overflow-auto h-96">
        <!-- item1 -->
        @foreach ($menus as $menu)
            <a href="{{ url('customer/' . $dataOrder->table_number . '/order/detail-menu/' . $menu->id) }}">
                <div class="rekomend flex items-center w-full mt-2">
                    <div class="bag-1">
                        <img src="{{ asset('/asset/img/sensasi-ngopi-di-sinia-coffe 1.png') }}" alt=""
                            class="gambar" width="100px">
                    </div>
                    <div class="bag-2 w-full">
                        <span class="font-bold text-white font-4xl">{{ $menu->name }}</span><br>
                        <p class="deskripsi">{{ $menu->description }}</p>
                        <div class="flex ">
                            <span class="harga">{{ number_format($menu->price) }}</span>
                            <div class="waktu flex w-full ">{{ $menu->serving_time }} Menit</div>
                            <form action="{{ url('customer/' . $dataOrder->table_number . '/order/detail/save') }}"
                                method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $dataOrder->table_number }}" name="table_number">
                                <input type="hidden" value="{{ $dataOrder->id }}" name="order_id">
                                <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                <div class="beli text-sm mt-1 font-bold"> <button type="submit" class="beli">+</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
@endsection
