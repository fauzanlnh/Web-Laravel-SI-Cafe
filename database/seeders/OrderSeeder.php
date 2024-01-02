<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $totalPurchases = 0;
            $randomDate = Carbon::now()->subDays(rand(1, 365));
            // insert data dummy menu dengan faker
            \DB::table('orders')->insert([
                'table_number' => $i,
                'date' => $randomDate,
                'payment_status' => "done",
                'total_purchases' => 0,
            ]);

            for ($j = 0; $j < 5; $j++) {
                $menu = Menu::find(rand(1, 20));
                $price = $menu->price;
                $qty = rand(1, 10);
                $detail_total = $price * $qty;
                \DB::table('order_details')->insert([
                    'order_id' => $i,
                    'menu_id' => $menu->id,
                    'price' => $price,
                    'qty' => $qty,
                    'order_detail_status' => 'served',
                    'detail_total' => $detail_total
                ]);
                $totalPurchases += $detail_total;
            }
            Order::find($i)->update(['total_purchases' => $totalPurchases]);
        }
    }
}
