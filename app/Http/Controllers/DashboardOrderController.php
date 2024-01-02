<?php

namespace App\Http\Controllers;

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
}
