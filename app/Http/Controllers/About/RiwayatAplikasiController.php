<?php

namespace App\Http\Controllers\About;

use App\DataTables\About\RiwayatAplikasiDataTable;
use App\Http\Controllers\Controller;
use App\Models\About\RiwayatAplikasi;
use Illuminate\Http\Request;

class RiwayatAplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RiwayatAplikasiDataTable $riwayatAplikasiDataTable)
    {
        return $riwayatAplikasiDataTable->render('pages.about.riwayat-aplikasi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.about.riwayat-aplikasi-form', [
            'data' => new RiwayatAplikasi(),
            'action' => route('about.riwayat-aplikasi.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
