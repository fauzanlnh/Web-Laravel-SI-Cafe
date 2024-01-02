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
        <div id="belanjaan" class='belanjaan top-0'>
            <div class="modal-content mx-auto flex flex-col">
                <span id="tutup" class="text-right font-bold tutup">&times;</span>
                <p class="isi-modal overflow-auto font-bold text-center">Verifikasi sudah terbayar?</p>
                <div class="flex justify-center mt-3">
                    <form action="{{ url('/petugas/checkout/' . $order->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <input type="hidden" value="{{ $listOrders[0]->table_number }}" name="table_number">
                        <input type="hidden" class='w-1/4 text-right float-right'
                            value="{{ $order->total }}"name="total2">
                        <button class="sudah font-bold text-white mx-2" type="submit">Sudah</button>
                    </form>
                    <button class="belum font-bold text-white mx-2" id="belum">Belum</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <!-- header -->
            <div class="header flex justify-between">
                <div class="icon">
                    <img src="/asset/coffee 2.png" alt="">
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
                    List Pesanan No {{ $order->id }}
                </div>
                <!-- sudah -->
                <div class="pembelian">
                    <div class="active flex flex-col mt-5">
                        <table class="text-center">
                            <tr>
                                <td class=" font-semibold">No</td>
                                <td class=" font-semibold">Nama Menu</td>
                                <td class=" font-semibold">Harga</td>
                                <td class=" font-semibold">Qty</td>
                                <td class=" font-semibold">Subtotal</td>
                            </tr>
                            <?php $i = 1; ?>
                            @foreach ($listOrders as $item)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ number_format($item->detail_total) }}</td>
                                </tr>
                                <?php $i = 1 + $i; ?>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-5 mr-2">
                Total :<input type="text" class='w-1/4 text-right float-right' value="{{ $order->total }}"readonly
                    name="total" id="total">
            </div>
            <div class="mt-5">
                Bayar :<input type="number" class='w-1/4  text-right float-right  border border-secondary' onchange="hitung(this.value)"
                    name="bayar" min=1>
            </div>
            <div class="mt-5 mr-2">
                Kembalian :<input type="number" class='w-1/4  text-right float-right'readonly name="kembalian"
                    id="kembalian">
            </div>
            <button class="pembayaran cart flex text-white justify-evenly mt-4">Lakukan Pembayaran </button>
        </div>
    </div>

</body>
<script>
    function hitung(val) {
        var total = parseInt(document.getElementById('total').value);
        var bayar = parseInt(val);
        var hitung = bayar - total;
        document.getElementById('kembalian').value = hitung;
    }
    const belanjaan = document.getElementById('belanjaan')
    const beli = document.getElementsByClassName('pembayaran')
    const tutup = document.getElementById('tutup')
    const belum = document.getElementById('belum')
    tutup.onclick = function() {
        belanjaan.style.display = "none"
    }
    belum.onclick = function() {
        belanjaan.style.display = "none"
    }
    for (let i = 0; i <= beli.length; i++) {
        beli[i].addEventListener('click', () => {
            belanjaan.style.display = "block";
            console.log(i);
        })
    }
</script>

</html>
