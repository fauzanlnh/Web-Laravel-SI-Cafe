<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardOrderController extends Controller
{
    private function getAllOrder()
    {
        return OrderDetail::where('order_detail_status', '=', 'pending')->orWhere('order_detail_status', 'cook')->with('order', 'menu')->get();
    }

    public function indexChef()
    {
        $orders = $this->getAllOrder();
        return view('Staff/Koki/index', ['orders' => $orders]);
    }

    public function processOrderChef(Request $request, $process)
    {
        DB::beginTransaction();
        try {
            if ($process == 'send-to-customer') {
                $detailOrder = OrderDetail::find($request->id);
                $detailOrder->update([
                    'order_detail_status' => 'served',
                ]);
            } else if ($process == 'cooking') {
                OrderDetail::find($request->id)->update(['order_detail_status' => 'cook']);
            }
            DB::commit();
            return redirect('koki');
        } catch (\Exception $e) {
            DB::rollBack();
            ddd($e);
        }
    }

    public function indexPetugas()
    {
        $orders = DB::table('order_details')
            ->selectRaw('orders.id, sum(detail_total) as total')
            ->where('payment_status', '=', 'pending')
            ->where('order_details.order_detail_status', '=', 'served')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->groupBy('orders.id')
            ->get();
        return view('staff/Petugas/index', ['orders' => $orders]);
    }

    public function viewCheckoutDetail($orderId)
    {
        $order = DB::table('order_details')
            ->selectRaw('orders.id, sum(detail_total) as total')
            ->where('order_details.order_detail_status', '=', 'served')
            ->where('orders.id', '=', $orderId)
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->groupBy('orders.id')
            ->first();

        $listOrders = OrderDetail::select('orders.table_number', 'order_details.price as price', 'menus.name', 'order_details.price', 'order_details.qty', "order_details.detail_total")
            ->where('order_details.order_id', '=', $orderId)
            ->where('order_details.order_detail_status', '=', 'served')
            ->join('menus', 'menus.id', '=', 'order_details.menu_id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->get();
        return view('staff/Petugas/checkoutDetail', ['order' => $order, 'listOrders' => $listOrders]);
    }

    public function processCheckOut($orderId, Request $request)
    {
        DB::beginTransaction();
        try {
            Order::find($orderId)->update([
                'payment_status' => 'done',
                'total_pembayaran' => $request->total2
            ]);

            OrderDetail::where('order_id', $orderId)->where('order_detail_status', '!=', 'served')->delete();

            Table::find($request->table_number)->update(['status' => 'Kosong']);
            DB::commit();
            return redirect('petugas');
        } catch (\Exception $e) {
            DB::rollBack();
            ddd($e);
        }
    }
}
