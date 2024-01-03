<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class DashboardStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @reaturn \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        return view('Staff.Admin.staffIndex', ['staff' => $staff]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @returan \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = ['admin', 'koki', 'petugas'];
        return view('Staff.Admin.staffForm', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @resturn \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => "required",
                'phone_number' => "required",
                'address' => "required",
                'username' => "required",
                'role' => "required"
            ]);

            // 
            $user = User::create([
                'role' => $request->role,
                'username' => $request->username,
                'password' => bcrypt($request->username),
            ]);

            // 
            Staff::create([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'user_id' => $user->id,
            ]);
            return redirect('/admin/staff')->with('success', 'pegawai Berhasil Ditambahkan');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/admin/staff/create')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/menu')->with('error', 'pegawai Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @areturn \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @retsurn \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $roles = ['admin', 'koki', 'petugas'];
        return view('Staff.Admin.staffForm', ['staff' => $staff, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @retusrn \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        try {
            $this->validate($request, [
                'name' => "required",
                'phone_number' => "required",
                'address' => "required",
                'username' => "required",
                'role' => "required"
            ]);

            // 
            $staff->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
            ]);
            // 
            $staff->user->update([
                'role' => $request->role,
                'username' => $request->username,
                'password' => bcrypt($request->username),
            ]);
            return redirect('/admin/staff')->with('success', 'pegawai Berhasil diubah');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/admin/staff/create')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/menu')->with('error', 'pegawai Gagal Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $status = $staff->delete();
        if ($status) {
            return redirect('/admin/staff')->with('success', 'pegawai Berhasil Dihapus');
        } else {
            return redirect('/admin/staff')->with('error', 'pegawai Gagal Dihapus');
        }

    }
}
