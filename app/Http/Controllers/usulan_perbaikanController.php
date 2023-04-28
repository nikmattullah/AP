<?php

namespace App\Http\Controllers;

use App\Models\biodata_dosen;
use App\Models\biodata_mahasiswa;
use App\Models\usulan_perbaikan;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class usulan_perbaikanController extends Controller
{
    public function index(Request $request)
    {
        Paginator::useBootstrap();
        $no = 1;
        $user = auth()->user()->id;
        $dosen = biodata_dosen::where('users_id',$user)->pluck('id');
        $data = biodata_mahasiswa::all();
        $usulan = usulan_perbaikan::where('biodata_dosens_id',$dosen)->paginate(10);

        if($request->search != ''){
            if(biodata_mahasiswa::where('nim',$request->search)->first() != null){
                $mhs = biodata_mahasiswa::where('nim',$request->search)->pluck('id');
                $usulan = usulan_perbaikan::where('biodata_dosens_id',$dosen)->where('biodata_mahasiswas_id',$mhs)->paginate(10);
            }else{
                return redirect()->back()->with('pesan','Mahasiswa Tidak Ditemukan');
            }
        }

        return view('koordinator.usulan_perbaikan',compact('usulan','data','no') );
    }
    public function store(Request $request)
    {
        $user = auth()->user()->id;
        $data = biodata_dosen::where('users_id',$user)->get();
        $nama = biodata_mahasiswa::where('nama','=',$request->nama)->get();

        $usulan_perbaikan = new usulan_perbaikan;
        // $nilai_android -> users_id = Auth::user()->id;
        $usulan_perbaikan -> biodata_mahasiswas_id = $nama[0]->id;
        $usulan_perbaikan -> biodata_dosens_id = $data[0]->id;
        $usulan_perbaikan -> usulan_1 = $request-> usulan_1;
        $usulan_perbaikan -> usulan_2 = $request-> usulan_2;
        $usulan_perbaikan -> usulan_3 = $request-> usulan_3;
        $usulan_perbaikan -> usulan_4 = $request-> usulan_4;
        $usulan_perbaikan -> usulan_5 = $request-> usulan_5;

        $usulan_perbaikan->save();

        return redirect('/Usulan Perbaikan');
    }
    public function update($id,Request $request)
    {
        $data = usulan_perbaikan::find($id);
        $data->update($request->all());
        return redirect('/Usulan Perbaikan');
    }
    public function destroy($id)
    {
        $data = usulan_perbaikan::find($id);
        $data -> delete();
        return redirect('/Usulan Perbaikan');
    }
}
