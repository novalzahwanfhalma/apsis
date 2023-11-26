<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Klien;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $klien = Klien::count();
        $admin = Admin::count();

        return view('admin.home_admin', compact('klien', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sortir_admin()
    {
        return view('admin.sortir_admin');
    }

    public function detail_survei_sortir()
    {
        return view('admin.detail_survei_sortir');
    }

    public function detail_survei_home()
    {
        return view('admin.detail_survei_home');
    }

    public function sudah_bayar()
    {
        return view('admin.sudah_bayar');
    }

    public function detail_sudah_bayar()
    {
        return view('admin.detail_sudah_bayar');
    }

    public function disetujui()
    {
        return view('admin.disetujui');
    }

    public function detail_disetujui()
    {
        return view('admin.detail_disetujui');
    }

    public function dibatalkan()
    {
        return view('admin.dibatalkan');
    }

    public function detail_dibatalkan()
    {
        return view('admin.detail_dibatalkan');
    }
}
