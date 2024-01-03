<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/tailwind.css') }}">
    <style>
        li>ul {
            transform: translatex(100%) scale(0)
        }

        li:hover>ul {
            transform: translatex(101%) scale(1)
        }

        li>button svg {
            transform: rotate(-90deg)
        }

        li:hover>button svg {
            transform: rotate(-270deg)
        }

        .group:hover .group-hover\:scale-100 {
            transform: scale(1)
        }

        .group:hover .group-hover\:-rotate-180 {
            transform: rotate(180deg)
        }

        .scale-0 {
            transform: scale(0)
        }

        .min-w-32 {
            min-width: 8rem
        }
    </style>
</head>

<body>
    <div class="main m-auto h-screen p-4">
        <div id="myModal" class="modal">
            <div class="modal-content mx-auto flex flex-col">
                <span id="close" class="text-right font-bold tutup">&times;</span>
                <p class="isi-modal overflow-auto h-72 ">List Pesanan</p>
                <div class="flex">
                    <div class="total text-sm font-bold"> Rp</div>
                    <a href="" class="mt-2">
                        <div class="checkout font-3xl h-full font-bold ">checkout</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <!-- header -->
            <div class="header flex">
                <div class="icon">
                    <img src="{{ asset('asset/img/coffee 2.png') }}" alt="">
                </div>
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
            <div class="flex justify-center">
                <img src="{{ asset('asset/img/28371769.png') }}" alt="">
            </div><!-- kategori -->

            <div class="flex justify-center">
                <form action="{{ url('customer/check-in') }}" method="POST">
                    {{ csrf_field() }}
                    <select
                        class="outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32 font-semibold"
                        id="inputGroupSelect03" aria-label="Example select with button addon" name="table_number">
                        <option class="pr-1 font-semibold flex-1 rounded">Silahkan Pilih Meja</option>
                        <ul
                            class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32 overflow-auto h-40">
                            @foreach ($tables as $table)
                                <li class="px-3 py-1 rounded-sm hover:bg-yellow-300 ">
                                    <option class="" value="{{ $table->id }}">{{ $table->name }}</option>
                                </li>
                            @endforeach
                        </ul>
                    </select>
                    <br>
                    <button type="submit" class="pesan">Submit</button>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('asset/js/main.js') }}"></script>

</html>
