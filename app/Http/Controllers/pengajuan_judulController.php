<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengajuan_judul;
use App\Models\bidang_minat;
use App\Models\biodata_mahasiswa;
use Illuminate\Support\Facades\Date;

class pengajuan_judulController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;
        $no = 1;
        $minat = bidang_minat::all();
        $biodata = biodata_mahasiswa::where('users_id',$user)->first();
        $ambil_id_mhs = $biodata->where('users_id',$user)->pluck('id');

        $id_mhs = pengajuan_judul::where('biodata_mahasiswas_id',$ambil_id_mhs)->first();
        
        $data = pengajuan_judul::where('users_id',$user)->get();
        $data1 = pengajuan_judul::where('users_id',$user)->count();

        return view('koordinator.pengajuan_judul',compact('data','minat','biodata','no','id_mhs','data1'));
    }


    public function store(Request $request)
    {
        $user = auth()->user()->id;
        $id_mhs = biodata_mahasiswa::where('users_id',$user)->get();

        $data1 = new pengajuan_judul;
        $data1 -> biodata_mahasiswas_id = $id_mhs[0]->id;
        $data1 -> bidang_minats_id = $request -> bidang_minats_id;
        $data1 -> biodata_dosens_id = 0;
        $data1 -> judul = $request -> judul;
        $data1 -> deskripsi = $request -> deskripsi;
        $data1 -> masalah = $request -> masalah;
        $data1 -> solusi = $request -> solusi;
        $data1 -> status = 0;
        $data1 -> users_id = auth()->user()->id;
        $data1 -> penguji_1 = 0;
        $data1 -> penguji_2 = 0;
        $data1 -> penguji_3 = 0;
        $data1 -> save();

        return redirect('/Pengajuan Judul');
    }

    public function update($id, Request $request)
    {
        $data = pengajuan_judul::find($id);
        $data -> biodata_mahasiswas_id = $request -> biodata_mahasiswas_id;
        $data -> bidang_minats_id = $request -> bidang_minats_id;
        $data -> judul = $request -> judul;
        $data -> deskripsi = $request -> deskripsi;
        $data -> masalah = $request -> masalah;
        $data -> solusi = $request -> solusi;
        $data -> status = 0;
        $data -> users_id = auth()->user()->id;
        $data -> update();
        return redirect('/Pengajuan Judul');
    }
    public function destroy($id)
    {
        $data = pengajuan_judul::find($id);
        $data->delete();
        return redirect('/Pengajuan Judul');
    }
}
