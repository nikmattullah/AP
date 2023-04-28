<?php

namespace App\Http\Controllers;

use App\Models\pengajuan_judul;
use App\Models\bidang_minat;
use App\Models\biodata_dosen;
use Illuminate\Http\Request;
use App\Models\data_bimbingan;
use App\Models\biodata_mahasiswa;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class data_bimbinganController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth()->user()->id;
        $id_dosen = biodata_dosen::where('users_id',$user)->first();
        Paginator::useBootstrap();
        $no = 1;
        $bio = biodata_mahasiswa::all();
        $data = data_bimbingan::where('biodata_dosens_id',$id_dosen->id)->paginate(3);

        if($request->search != ''){
            if(biodata_mahasiswa::where('nim',$request->search)->first() != null){
                $mhs = biodata_mahasiswa::where('nim',$request->search)->pluck('id');
                $data = data_bimbingan::where('biodata_mahasiswas_id',$mhs)->where('biodata_dosens_id',$id_dosen->id)->paginate(3);
            }else{
                return redirect()->back()->with('pesan','Mahasiswa Tidak Ditemukan');
            }
        }elseif($request->date !=''){
            if(data_bimbingan::where('tanggal',$request->date)->first() != null){
                $data = data_bimbingan::where('tanggal',$request->date)->where('biodata_dosens_id',$id_dosen->id)->paginate(3);
            }else{
                return redirect()->back()->with('pesan','Tanggal Tidak Ditemukan');
            }
        }
        return view('koordinator.data_bimbingan',compact('data','no','bio'));
    }

    public function index_mahasiswa(Request $request)
    {
        Paginator::useBootstrap();
        $no = 1;
        $user = auth()->user()->id;
        $mahasiswa = biodata_mahasiswa::where('users_id',$user)->first();
        $idmhs= $mahasiswa->id;        
        $data = data_bimbingan::where('biodata_mahasiswas_id',$idmhs)->paginate(3);

        if($request->date !=''){
            if(data_bimbingan::where('tanggal',$request->date)->first() != null){
                $data = data_bimbingan::where('tanggal',$request->date)->paginate(3);
            }else{
                return redirect()->back()->with('pesan','Tanggal Tidak Ditemukan');
            }
        }

        return view('koordinator.bimbingan',compact('data','no'));
    }


    public function store(Request $request)
    {
        $id_login = auth()->user()->id;
        $id_mhs = biodata_mahasiswa::where('users_id',$id_login)->first('id');
        $id_dosen = pengajuan_judul::where('biodata_mahasiswas_id',$id_mhs->id)->where('status','1')->first();
        $data_bimbingan = new data_bimbingan;
        $data_bimbingan -> biodata_mahasiswas_id = $id_mhs->id;
        $data_bimbingan -> biodata_dosens_id = $id_dosen->biodata_dosens_id;
        $data_bimbingan -> tanggal = $request-> tanggal;
        $data_bimbingan -> materi_konsultasi = $request-> materi_konsultasi;
        $data_bimbingan -> revisi = $request-> revisi;

        $data_bimbingan->save();

        return redirect('/Bimbingan');
    }


    public function destroy($id)
    {
        $data = data_bimbingan::find($id);
        $data->delete();
        return redirect('/Data Bimbingan');
    }



    public function update($id,Request $request)
    {
        $data = data_bimbingan::find($id);
        $data -> update($request->all());
        return redirect('/Bimbingan');  
    }

    public function update_checkbox($id,Request $request)
    {
        $data = data_bimbingan::find($id);
        $data->checkbox = 1;
        $data -> update();
        return redirect()->back();
    }
    
    public function update_uncheckbox($id,Request $request)
    {
        $data = data_bimbingan::find($id);
        $data->checkbox = 0;
        $data -> update();
        return redirect()->back();
    }

    public function bimbingan(Request $request)
    {
        Paginator::useBootstrap();
        $no = 1;
        $bio = biodata_mahasiswa::all();
        $data = data_bimbingan::paginate(3);
        if($request->search != ''){
            if(biodata_mahasiswa::where('nim',$request->search)->first() != null){
                $mhs = biodata_mahasiswa::where('nim',$request->search)->pluck('id');
                $data = data_bimbingan::where('biodata_mahasiswas_id',$mhs)->paginate(3);
            }else{
                return redirect()->back()->with('pesan','Mahasiswa Tidak Ditemukan');
            }
        }elseif($request->date !=''){
            if(data_bimbingan::where('tanggal',$request->date)->first() != null){
                $data = data_bimbingan::where('tanggal',$request->date)->paginate(3);
            }else{
                return redirect()->back()->with('pesan','Tanggal Tidak Ditemukan');
            }
        }
        return view('koordinator.data_bimbingan_koordinator',compact('data','no','bio'));
    }
}
