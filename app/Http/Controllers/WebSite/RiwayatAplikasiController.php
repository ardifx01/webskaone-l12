<?php

namespace App\Http\Controllers\WebSite;

use App\DataTables\WebSite\RiwayatAplikasiDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebSite\RiwayatAplikasiRequest;
use App\Models\WebSite\RiwayatAplikasi;
use Illuminate\Http\Request;

class RiwayatAplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RiwayatAplikasiDataTable $riwayatAplikasiDataTable)
    {
        return $riwayatAplikasiDataTable->render('pages.website.riwayat-aplikasi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.website.riwayat-aplikasi-form', [
            'data' => new RiwayatAplikasi(),
            'action' => route('websiteapp.riwayat-aplikasi.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RiwayatAplikasiRequest $request)
    {
        $riwayat_aplikasi = new RiwayatAplikasi($request->validated());
        $riwayat_aplikasi->save();

        return responseSuccess();
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
    public function edit(RiwayatAplikasi $riwayat_aplikasi)
    {
        return view('pages.website.riwayat-aplikasi-form', [
            'data' => $riwayat_aplikasi,
            'action' => route('websiteapp.riwayat-aplikasi.update', $riwayat_aplikasi->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RiwayatAplikasiRequest $request, RiwayatAplikasi $riwayat_aplikasi)
    {
        $riwayat_aplikasi->fill($request->validated());
        $riwayat_aplikasi->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RiwayatAplikasi $riwayat_aplikasi)
    {
        $riwayat_aplikasi->delete();

        return responseSuccessDelete();
    }
}
