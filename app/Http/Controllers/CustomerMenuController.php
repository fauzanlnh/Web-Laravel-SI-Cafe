<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerMenuController extends Controller
{
    private function getOrderByTableNumber($tableNumber)
    {
        return Order::select('*')
            ->where('table_number', '=', $tableNumber)
            ->where('payment_status', '=', "Pending")->with('detailOrder.menu')
            ->first();
    }

    private function getMenuByCategory($category)
    {
        return Menu::select('*')
            ->where('category', '=', $category)
            ->where('status', '=', "available")
            ->get();
    }

    public function viewFoodMenu($tableNumber)
    {
        $dataOrder = $this->getOrderByTableNumber($tableNumber);
        if (!$dataOrder) {
            return redirect('customer/');
        }
        $foods = $this->getMenuByCategory('food');
        // ddd($dataOrder, $dataOrder->detailOrder);
        return view('Customer/menu', ['menus' => $foods, 'dataOrder' => $dataOrder]);
    }

    public function viewDrinkMenu($tableNumber)
    {
        $dataOrder = $this->getOrderByTableNumber($tableNumber);
        if (!$dataOrder) {
            return redirect('customer/');
        }
        $drinks = $this->getMenuByCategory('drink');
        // ddd($dataOrder, $dataOrder->detailOrder);
        return view('Customer/menu', ['menus' => $drinks, 'dataOrder' => $dataOrder]);
    }

    public function viewDetailMenu($tableNumber, $idMenu)
    {
        $dataOrder = $this->getOrderByTableNumber($tableNumber);
        if (!$dataOrder) {
            return redirect('customer/');
        }
        $menu = Menu::find($idMenu);
        return view('Customer/menuDetail', ['menu' => $menu, 'dataOrder' => $dataOrder]);
    }
}
