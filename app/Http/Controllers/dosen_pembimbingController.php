<?php

namespace App\Http\Controllers;

use App\Models\bidang_minat;
use App\Models\biodata_dosen;
use App\Models\biodata_mahasiswa;
use App\Models\pengajuan_judul;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class dosen_pembimbingController extends Controller
{
    public function index(Request $request)
    {
        $no = 1;
        $data = pengajuan_judul::where('status','=','1')->paginate(10);
        $dosen = biodata_dosen::all();
        $bidang_minat = bidang_minat::all();
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

        return view('koordinator.data_pembimbing',compact('no','data','dosen','bidang_minat'));
    }
    
    public function update($id,Request $request)
    {    
        $data = pengajuan_judul::find($id);
        $data ->biodata_dosens_id = $request->dosen;
        $data->update();

        return redirect('/Data Pembimbing');
    }
}
