<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengajuan_judul;
use App\Models\bidang_minat;
use App\Models\biodata_dosen;
use App\Models\biodata_mahasiswa;
use Illuminate\Pagination\Paginator;

class usulan_judulController extends Controller
{
    public function index(Request $request)
    {
        $no = 1;
        $dosen = biodata_dosen::all();
        $bidang_minat = bidang_minat::all();
        $data = pengajuan_judul::where('status',0)->paginate(9);
        Paginator::useBootstrap();

        if($request->search != ''){
            if(biodata_mahasiswa::where('nim',$request->search)->first() != null){
                $mhs = biodata_mahasiswa::where('nim',$request->search)->pluck('id');
                $data = pengajuan_judul::where('status',0)->where('biodata_mahasiswas_id',$mhs)->paginate(9);
            }else{
                return redirect()->back()->with('pesan','Mahasiswa Tidak Ditemukan');
            }
        }elseif($request->select !=''){
            if(pengajuan_judul::where('bidang_minats_id',$request->select)->where('status',0)->first() != null){
                $data = pengajuan_judul::where('status',0)->where('bidang_minats_id',$request->select)->paginate(9);
            }else{
                return redirect()->back()->with('pesan','Bidang Minat Tidak Ditemukan');
            }
        }
        return view('koordinator.usulan_judul',compact('data','no','dosen','bidang_minat'));
    }

    public function listjudulterima(Request $request)
    {
        $no = 1;
        $minat = bidang_minat::all();
        $data = pengajuan_judul::where('status',1)->paginate(10);
        $dosen = biodata_dosen::all();
        Paginator::useBootstrap();

        if($request->search != ''){
            if(biodata_mahasiswa::where('nim',$request->search)->first() != null){
                $mhs = biodata_mahasiswa::where('nim',$request->search)->pluck('id');
                $data = pengajuan_judul::where('status',1)->where('biodata_mahasiswas_id',$mhs)->paginate(10);
            }else{
                return redirect()->back()->with('pesan','Mahasiswa Tidak Ditemukan');
            }
        }elseif($request->select !=''){
            if(pengajuan_judul::where('bidang_minats_id',$request->select)->where('status',1)->first() != null){
                $data = pengajuan_judul::where('status',1)->where('bidang_minats_id',$request->select)->paginate(10);
            }else{
                return redirect()->back()->with('pesan','Bidang Minat Tidak Ditemukan');
            }
        }

        return view('koordinator.usulan_judul_diterima',compact('data','minat','no','dosen'));
    }

    public function list_judul_tolak(Request $request)
    {
        $no = 1;
        $minat = bidang_minat::all();
        $data = pengajuan_judul::where('status',2)->paginate(10);
        Paginator::useBootstrap();

        if($request->search != ''){
            if(biodata_mahasiswa::where('nim',$request->search)->first() != null){
                $mhs = biodata_mahasiswa::where('nim',$request->search)->pluck('id');
                $data = pengajuan_judul::where('status',2)->where('biodata_mahasiswas_id',$mhs)->paginate(10);
            }else{
                return redirect()->back()->with('pesan','Mahasiswa Tidak Ditemukan');
            }
        }elseif($request->select !=''){
            if(pengajuan_judul::where('bidang_minats_id',$request->select)->where('status',2)->first() != null){
                $data = pengajuan_judul::where('status',2)->where('bidang_minats_id',$request->select)->paginate(10);
            }else{
                return redirect()->back()->with('pesan','Bidang Minat Tidak Ditemukan');
            }
        }

        return view('koordinator.usulan_judul_ditolak',compact('data','minat','no'));
    }

    public function status($id, Request $request)
    {
        $pengajuan  = pengajuan_judul::where('biodata_mahasiswas_id',$request->biodata_mahasiswa)->pluck('id');
        // status update
        foreach ($pengajuan as $key) {
            $data = pengajuan_judul::find($key);
            $data -> status = 2;
            $data -> update();
        }
        // status $ pembimbing update
        $data = pengajuan_judul::find($id);
        $data -> status = 1;
        $data -> biodata_dosens_id = $request->dosen;
        $data -> update();

        return redirect('/Usulan Judul');
    }
   
    public function tolak($id, Request $request)
    {
        # code...
        $data = pengajuan_judul::find($id);
        $data -> status = 2;
        $data -> update();

        return redirect('/Usulan Judul');
    }
}
