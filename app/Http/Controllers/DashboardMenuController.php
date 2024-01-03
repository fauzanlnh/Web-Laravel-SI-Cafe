<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DashboardMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return response()->view('Staff.Admin.menuIndex', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Menu::selectRaw('category as name')->groupBy('category')->get();
        return response()->view('Staff.Admin.menuForm', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @raeturn \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => "required",
                'price' => "required|numeric",
                'description' => "required",
                'serving_time' => 'required|numeric',
                'category' => 'required',
            ]);
            Menu::create([
                'name' => $request->name,
                'price' => $request->price,
                'category' => $request->category,
                'status' => 'available',
                'description' => $request->description,
                'serving_time' => $request->serving_time,
            ]);
            return redirect('/admin/menu')->with('success', 'Menu Berhasil Ditambahkan');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/admin/menu/create')->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/menu')->with('error', 'Menu Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        // $menu = Menu::find($menu);
        // return response()->view('Staff.Admin.menuForm', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories = Menu::selectRaw('category as name')->groupBy('category')->get();
        $statuses = ['available', 'unavailable'];
        return response()->view('Staff.Admin.menuForm', ['menu' => $menu, 'categories' => $categories, 'statuses' => $statuses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @areturn \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        try {
            $this->validate($request, [
                'name' => "required",
                'price' => "required",
                'description' => "required",
                'serving_time' => 'required',
                'category' => 'required',
                'status' => 'required',
            ]);

            $menu->update([
                'name' => $request->name,
                'price' => $request->price,
                'category' => $request->category,
                'status' => $request->status,
                'description' => $request->description,
                'serving_time' => $request->serving_time,
            ]);
            return redirect('/admin/menu')->with('success', 'Menu Berhasil Diubah');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/admin/menu/create')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/menu')->with('error', 'Menu Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();
            return redirect('/admin/menu')->with('success', 'Menu Berhasil Dihapus');
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/menu')->with('error', 'Menu Gagal Diubah');
        }
    }
}
