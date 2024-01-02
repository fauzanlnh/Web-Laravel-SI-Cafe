<!-- header -->
<div class="header flex">
    <div class="icon">
        <img src="{{ asset('asset/img/coffee 2.png') }}" alt="">
    </div>
    <a href="{{ url('/customer/' . $dataOrder->table_number . '/order/list') }}">
        <div class="checkout flex ml-32">
            <img src="{{ asset('asset/img/Frame.svg') }}" alt="" height="15" width="15" class="mr-1">
            Pesanan
        </div>
    </a>
    <div class="keranjang flex ml-2" id="keranjang">
        <img src="{{ asset('asset/img/cart-add 1.svg') }}" alt="" height="15" width="15" class="mr-1">
        Keranjang
    </div>
</div>
