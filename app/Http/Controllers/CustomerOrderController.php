<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Table;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerOrderController extends Controller
{
    private function getOrderByTableNumber($tableNumber)
    {
        return Order::select('*')
            ->where('table_number', '=', $tableNumber)
            ->where('payment_status', '=', "Pending")->with('detailOrder.menu')
            ->first();
    }

    public function index()
    {
        $tables = Table::where('status', '=', 'Kosong')->get();
        return view('customer/index', ['tables' => $tables, 'dataOrder' => null]);
    }

    public function checkIn(Request $request)
    {
        $date = Carbon::now();
        $date->toDateString();
        DB::beginTransaction();
        try {
            Order::create([
                'table_number' => $request->table_number,
                'date' => $date,
                'payment_status' => 'Pending',
                'total_pembayaran' => 0,
            ]);

            Table::where('id', '=', $request->table_number)
                ->update(['status' => 'filled']);

            DB::commit();
            return redirect('customer/' . $request->table_number . '/order/food');

        } catch (\Exception $e) {
            DB::rollBack();
            ddd($e);
        }
    }

    /**
     * If the order detail have same menu then the order detail only update the qty with prevQty + 1 
     * If the order detail don't have the same menu then insert as new detail
     */
    public function saveToCart(Request $request)
    {
        DB::beginTransaction();
        try {
            $order_id = $request->order_id;
            $menu_id = $request->menu_id;
            $detail = OrderDetail::select('*')
                ->where('order_id', '=', $order_id)
                ->where('menu_id', '=', $menu_id)
                ->where('order_detail_status', '=', 'cart')
                ->first();

            if ($detail) {
                $newQty = $detail->qty + 1;
                $detail->update([
                    'qty' => $newQty,
                    'detail_total' => $newQty * $detail->price,
                ]);
            } else {
                $menu = Menu::find($menu_id);

                OrderDetail::create([
                    'order_detail_status' => 'cart',
                    'order_id' => $request->order_id,
                    'menu_id' => $request->menu_id,
                    'price' => $menu->price,
                    'detail_total' => $menu->price,
                    'qty' => 1,
                ]);
            }
            DB::commit();
            return redirect('customer/' . $request->table_number . '/order/list');
        } catch (\Exception $e) {
            DB::rollBack();
            ddd($e);
        }
    }

    public function cancelOrderInCart($tableNumber, $orderDetailId)
    {
        DB::beginTransaction();
        try {
            $orderDetail = OrderDetail::find($orderDetailId);
            $orderDetail->delete();
            DB::commit();
            return redirect('customer/' . $tableNumber . '/order/list');
        } catch (\Exception $e) {
            DB::rollBack();
            ddd($e);
        }
    }

    public function processOrderInCart($tableNumber)
    {
        $dataOrder = $this->getOrderByTableNumber($tableNumber);
        DB::beginTransaction();
        try {
            OrderDetail::where('order_id', '=', $dataOrder->id)
                ->where('order_detail_status', '=', 'cart')
                ->update(['order_detail_status' => 'pending']);
            DB::commit();
            return redirect('customer/' . $tableNumber . '/order/list');
        } catch (\Exception $e) {
            DB::rollBack();
            ddd($e);
        }
    }

    public function detailOrder($tableNumber)
    {
        $dataOrder = $this->getOrderByTableNumber($tableNumber);
        if (!$dataOrder) {
            return redirect('customer/');
        }
        return view('Customer.orderList', ['dataOrder' => $dataOrder]);
    }

    public function viewInvoice($tableNumber)
    {
        $dataOrder = $this->getOrderByTableNumber($tableNumber);
        if (!$dataOrder) {
            return redirect('customer/');
        }
        return view('Customer.orderInvoice', ['dataOrder' => $dataOrder]);
    }
}
