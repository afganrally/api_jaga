<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RuanganResource;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangan = Ruangan::latest()->paginate(10);

        return new RuanganResource(true, 'Data Ruangan', $ruangan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //create post
        $ruangan = Ruangan::create([
            'rfid'   => $request->rfid,
            'nama_ruang'   => $request->nama_ruang,
            'kelas'   => $request->kelas,
            'tempat_tidur'   => $request->tempat_tidur,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruangan $ruangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $rfid)
    {
        $ruangan = Ruangan::find($rfid);

        $ruangan->update([
            'rfid'   => $request->rfid,
            'nama_ruang'   => $request->nama_ruang,
            'kelas'   => $request->kelas,
            'tempat_tidur'   => $request->tempat_tidur,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruangan $ruangan)
    {
        //
    }
}
