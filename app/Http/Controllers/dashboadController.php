<?php

namespace App\Http\Controllers;

use App\Models\biodata_dosen;
use App\Models\biodata_mahasiswa;
use App\Models\pengajuan_judul;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class dashboadController extends Controller
{
    public function index()
    {
        $user = auth()->user()->level;

        if ($user == 'dosen'){
            if(biodata_dosen::where('users_id',auth()->user()->id)->first() !=null){
                return view('koordinator.index');
            }else{
                $email_dosen = auth()->user()->email;
                return view('koordinator.form_biodata_dosen',compact('email_dosen'));
            }
        }elseif ($user == 'admin') {
            $dosen = User::where('level','dosen')->count();
            $usulan = pengajuan_judul::where('status','0')->count();
            $terima = pengajuan_judul::where('status','1')->count();
            $tolak = pengajuan_judul::where('status','2')->count();
            return view('koordinator.index',compact('dosen','usulan','terima','tolak'));

        }elseif($user == 'mahasiswa'){
            $id = auth()->user()->id;
            $id_mhs = biodata_mahasiswa::where('users_id',$id)->get();
            
            if (pengajuan_judul::where('biodata_mahasiswas_id',$id_mhs[0]->id)->first() == null) {
                $dosen_pembimbing = "On Progress";
                $tgl = "On Progress";
                $waktu = "On Progress";
                $ruangan = "On Progress";
                $judul = "On Progress";
                $deskripsi = "On Progress";
                $masalah = "On Progress";
                $solusi = "On Progress";
                return view('koordinator.index',compact('dosen_pembimbing','tgl','waktu','ruangan','judul','deskripsi','masalah','solusi'));
            
            }elseif (pengajuan_judul::where('biodata_mahasiswas_id',$id_mhs[0]->id)->where('status',0)->first()) {
                $dosen_pembimbing = "On Progress";
                $tgl = "On Progress";
                $waktu = "On Progress";
                $ruangan = "On Progress";
                $judul = "On Progress";
                $deskripsi = "On Progress";
                $masalah = "On Progress";
                $solusi = "On Progress";
                return view('koordinator.index',compact('dosen_pembimbing','tgl','waktu','ruangan','judul','deskripsi','masalah','solusi'));
            
            }elseif (pengajuan_judul::where('biodata_mahasiswas_id',$id_mhs[0]->id)->where('status',1)->first()) {
                $data = pengajuan_judul::where('biodata_mahasiswas_id',$id_mhs[0]->id)->where('status',1)->first();
                    if ($data -> tanggal == null) {
                        $dosen_pembimbing = $data->biodata_dosen->nama;
                        $tgl = "On Progress";
                        $waktu = "On Progress";
                        $ruangan = "On Progress";
                        $judul = $data->judul;
                        $deskripsi = $data->deskripsi;
                        $masalah = $data->masalah;
                        $solusi = $data->solusi;
                        return view('koordinator.index',compact('dosen_pembimbing','tgl','waktu','ruangan','judul','deskripsi','masalah','solusi'));
                    }else{
                        $dosen_pembimbing = $data->biodata_dosen->nama;
                        $tgl =\Carbon\Carbon::createFromFormat('Y-m-d', $data->tanggal)->format('m-d-Y');
                        $waktu =\Carbon\Carbon::createFromFormat('H:i:s', $data->jam)->format('H:i');
                        $ruangan = $data->ruangan;
                        $judul = $data->judul;
                        $deskripsi = $data->deskripsi;
                        $masalah = $data->masalah;
                        $solusi = $data->solusi;
                        return view('koordinator.index',compact('dosen_pembimbing','tgl','waktu','ruangan','judul','deskripsi','masalah','solusi'));
                    }    
            }
        }
    }
}
