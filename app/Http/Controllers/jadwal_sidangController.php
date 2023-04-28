<?php

namespace App\Http\Controllers;

use App\Models\biodata_dosen;
use App\Models\pengajuan_judul;
use App\Models\biodata_mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Laravel\Ui\Presets\React;

class jadwal_sidangController extends Controller
{
    public function index(Request $request)
    {
        Paginator::useBootstrap();
        $no = 1;
        $data = pengajuan_judul::where('status','=','1')->paginate(10);
        $dosen = biodata_dosen::all(); 

        if($request->search != ''){
            if(biodata_mahasiswa::where('nim',$request->search)->first() != null){
                $mhs = biodata_mahasiswa::where('nim',$request->search)->pluck('id');
                $data = pengajuan_judul::where('status',1)->where('biodata_mahasiswas_id',$mhs)->paginate(10);
            }else{
                return redirect()->back()->with('pesan','Mahasiswa Tidak Ditemukan');
            }
        }elseif($request->date !=''){
            if(pengajuan_judul::where('tanggal',$request->date)->where('status',1)->first() != null){
                $data = pengajuan_judul::where('status',1)->where('tanggal',$request->date)->paginate(10);
            }else{
                return redirect()->back()->with('pesan','Tanggal Tidak Ditemukan');
            }
        }

        return view('koordinator.jadwal_sidang',compact('data','no','dosen'));
    }

    public function update($id, Request $request)
    {
        $data = pengajuan_judul::find($id);
        $data->penguji_1 = $request->penguji_1;
        $data->penguji_2 = $request->penguji_2;
        $data->penguji_3 = $request->penguji_3;
        $data->tanggal = $request->tanggal;
        $data->jam = $request->jam;
        $data->ruangan = $request->ruang;
        $data->update();
        return redirect('/Jadwal Sidang');
    }
}
