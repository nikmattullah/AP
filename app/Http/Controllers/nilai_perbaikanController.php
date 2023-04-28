<?php

namespace App\Http\Controllers;

use App\Models\biodata_mahasiswa;
use App\Models\nilai_perbaikan;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class nilai_perbaikanController extends Controller
{
    public function index(Request $request)
    {
        Paginator::useBootstrap();
        $no = 1;
        $data = biodata_mahasiswa::all(); 
        $perbaikan = nilai_perbaikan::paginate(10);

        if($request->search != ''){
            if(biodata_mahasiswa::where('nim',$request->search)->first() != null){
                $mhs = biodata_mahasiswa::where('nim',$request->search)->pluck('id');
                $perbaikan = nilai_perbaikan::where('biodata_mahasiswas_id',$mhs)->paginate(10);
            }else{
                return redirect()->back()->with('pesan','Mahasiswa Tidak Ditemukan');
            }
        }

        return view('koordinator.nilai_perbaikan',compact('data','perbaikan','no') );
    }
    public function store(Request $request)
    {
        $nama = biodata_mahasiswa::where('nama','=',$request->nama)->get();

        $nilai_perbaikan = new nilai_perbaikan;
        $nilai_perbaikan -> biodata_mahasiswas_id = $nama[0]->id;
        $nilai_perbaikan -> nilai_perbaikan = $request-> nilai_perbaikan;     
        $nilai_perbaikan->save();

        return redirect('/Nilai Perbaikan');
    }
    public function update($id, Request $request)
    {
        $data = nilai_perbaikan::find($id);
        $data -> update($request->all());
        return redirect('/Nilai Perbaikan');
    }
    public function destroy($id)
    {
        $data = nilai_perbaikan::find($id);
        $data -> delete();
        return redirect('/Nilai Perbaikan');
    }

}
