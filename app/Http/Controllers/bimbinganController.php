<?php

namespace App\Http\Controllers;

use App\Models\biodata_mahasiswa;
use App\Models\data_bimbingan;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class bimbinganController extends Controller
{
    public function index(Request $request)
    {
        Paginator::useBootstrap();
        $no = 1;
        $user = auth()->user()->id;
        $mahasiswa = biodata_mahasiswa::where('users_id',$user)->first();
        $idmhs= $mahasiswa->id;        
        $data = data_bimbingan::where('biodata_mahasiswas_id',$idmhs)->paginate(10);

        if($request->date !=''){
            if(data_bimbingan::where('tanggal',$request->date)->first() != null){
                $data = data_bimbingan::where('tanggal',$request->date)->paginate(10);
            }else{
                return redirect()->back()->with('pesan','Tanggal Tidak Ditemukan');
            }
        }

        return view('koordinator.bimbingan',compact('data','no'));
    }
}
