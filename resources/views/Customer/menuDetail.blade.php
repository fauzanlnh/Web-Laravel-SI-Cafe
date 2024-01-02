@extends('customer.layouts.template')
@section('main-content')
    <!-- detail menu -->
    <div class="kategori ml-4 mt-1">
        Detail Menu
    </div>
    <div class="detail-menu flex justify-between">
        <div class="jenis">
            <img src="{{ asset('asset/img/coffee 3.svg') }}" alt="">
        </div>
        <div class="detail-gambar">
            <img src="{{ asset('asset/img/sensasi-ngopi-di-sinia-coffe 2.png') }}" alt="">
            <div class="tag-line mt-2 w-max ml-auto">
                Cocok buat senja
            </div>
        </div>
    </div>
    <div class="kategori ml-4 mt-1">
        Deskripsi
    </div>
    <div class="deskripsi-makanan   ">
        {{ $menu->description }}
    </div>
    <div class="deskrpisi-pesanan flex ">
        <div class=" waktu-pesan">{{ $menu->serving_time }} Menit</div>
        <div class="harga-pesan">{{ 'Rp. ' . number_format($menu->price) }}</div>
    </div>
    <form action="{{ url('customer/' . $dataOrder->table_number . '/order/detail/save') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" value="{{ $dataOrder->table_number }}" name="table_number">
        <input type="hidden" value="{{ $dataOrder->id }}" name="order_id">
        <input type="hidden" value="{{ $menu->id }}" name="menu_id">
        <div class="pesan">
            <button type="submit" class="pesan">Tambah ke keranjang +</button>
        </div>
    </form>
@endsection
