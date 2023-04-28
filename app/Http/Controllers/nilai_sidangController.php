<?php

namespace App\Http\Controllers;

use App\Models\bidang_minat;
use App\Models\biodata_dosen;
use Illuminate\Http\Request;
use App\Models\biodata_mahasiswa;
use App\Models\nilai_android;
use App\Models\nilai_jaringan;
use App\Models\nilai_perbaikan;
use App\Models\nilai_website;
use App\Models\pengajuan_judul;
use Illuminate\Pagination\Paginator;
use Whoops\Run;

class nilai_sidangController extends Controller
{
    //ANDROID
    public function android(Request $request)
    {
        Paginator::useBootstrap();
        $no = 1;
        $user = auth()->user()->id;
        $dosen = biodata_dosen::where('users_id',$user)->pluck('id');        

        $minat = bidang_minat::where('nm_minat','MOBILE PROGRAMMING')->pluck('id');
        $data = pengajuan_judul::where('bidang_minats_id',$minat)->where('status',1)->get();
        
        $android = nilai_android::where('biodata_dosens_id',$dosen)->paginate(10);

        if($request->search != ''){
            if(biodata_mahasiswa::where('nim',$request->search)->first() != null){
                $mhs = biodata_mahasiswa::where('nim',$request->search)->pluck('id');
                $android = nilai_android::where('biodata_dosens_id',$dosen)->where('biodata_mahasiswas_id',$mhs)->paginate(10);
            }else{
                return redirect()->back()->with('pesan','Mahasiswa Tidak Ditemukan');
            }
        }

        return view('koordinator.nilai_android',compact('data','android','no') );
    }
    public function simpanandroid(Request $request)
    {
        $nama = biodata_mahasiswa::where('nama','=',$request->nama)->get();
        $user = auth()->user()->id;
        $data = biodata_dosen::where('users_id',$user)->get();
        
        $d = biodata_mahasiswa::where('nama','=',$request->nama)->pluck('id');
        $p = nilai_android::where('biodata_mahasiswas_id',$d)->count();
        if ($p == 0) {
            $penguji = 1;
        }elseif ($p == 1) {
            $penguji = 2;
        }elseif ($p == 2) {
            $penguji = 3;
        }
        $nilai_android = new nilai_android;
        $nilai_android -> biodata_mahasiswas_id = $nama[0]->id;
        $nilai_android -> biodata_dosens_id = $data[0]->id;
        $nilai_android -> penguji = $penguji;
        $nilai_android -> penulisan = $request-> penulisan;
        $nilai_android -> performa = $request-> performa;
        $nilai_android -> desen_ui = $request-> desen_ui;
        $nilai_android -> hasil_aplikasi = $request-> hasil_aplikasi;
        $nilai_android->save();                 
            
        return redirect('/Nilai Android');
       
    }
    public function ubahandroid($id, Request $request)
    {
        $data = nilai_android::find($id);
        $data -> update($request->all());
        return redirect('/Nilai Android');
    }
    public function hapusandroid ($id)
    {
        $data = nilai_android::find($id);
        $data -> delete();
        return redirect('/Nilai Android');
    }


    //WEBSITE
    public function website(Request $request)
    {
        Paginator::useBootstrap();
        $no = 1;
        $user = auth()->user()->id;
        $dosen = biodata_dosen::where('users_id',$user)->pluck('id'); 
        
        $minat = bidang_minat::where('nm_minat','WEB PROGRAMMING')->pluck('id');
        $data = pengajuan_judul::where('bidang_minats_id',$minat)->where('status',1)->get();

        $website = nilai_website::where('biodata_dosens_id',$dosen)->paginate(10);

        if($request->search != ''){
            if(biodata_mahasiswa::where('nim',$request->search)->first() != null){
                $mhs = biodata_mahasiswa::where('nim',$request->search)->pluck('id');
                $website = nilai_website::where('biodata_dosens_id',$dosen)->where('biodata_mahasiswas_id',$mhs)->paginate(10);
            }else{
                return redirect()->back()->with('pesan','Mahasiswa Tidak Ditemukan');
            }
        }
        return view('koordinator.nilai_website',compact('data','website','no') );
    }
    public function simpanwebsite(Request $request)
    {
        $nama = biodata_mahasiswa::where('nama','=',$request->nama)->get();
        $user = auth()->user()->id;
        $data = biodata_dosen::where('users_id',$user)->get();

        $d = biodata_mahasiswa::where('nama','=',$request->nama)->pluck('id');
        $p = nilai_android::where('biodata_mahasiswas_id',$d)->count();
        if ($p == 0) {
            $penguji = 1;
        }elseif ($p == 1) {
            $penguji = 2;
        }elseif ($p == 2) {
            $penguji = 3;
        }
        
        $nilai_website = new nilai_website;
        $nilai_website -> biodata_mahasiswas_id = $nama[0]->id;
        $nilai_website -> biodata_dosens_id = $data[0]->id;
        $nilai_website -> penguji = $penguji;
        $nilai_website -> penulisan = $request-> penulisan;
        $nilai_website -> penguasaan_project = $request-> penguasaan_project;
        $nilai_website -> template = $request-> template;
        $nilai_website -> konten = $request-> konten;
        $nilai_website -> hosting = $request-> hosting;

        $nilai_website->save();

        return redirect('/Nilai Website');
    }
    public function ubahwebsite($id, Request $request)
    {
        $data = nilai_website::find($id);
        $data -> update($request->all());
        return redirect('/Nilai Website');
    }
    public function hapuswebsite($id)
    {
        $data = nilai_website::find($id);
        $data -> delete();
        return redirect('/Nilai Website');
    }
    
    //JARINGAN
    public function jaringan(Request $request)
    {
        Paginator::useBootstrap();
        $no = 1;
        $user = auth()->user()->id;
        $dosen = biodata_dosen::where('users_id',$user)->pluck('id'); 

        $minat = bidang_minat::where('nm_minat','NETWORK')->pluck('id');
        $data = pengajuan_judul::where('bidang_minats_id',$minat)->where('status',1)->get();

        $jaringan = nilai_jaringan::where('biodata_dosens_id',$dosen)->paginate(10);

        if($request->search != ''){
            if(biodata_mahasiswa::where('nim',$request->search)->first() != null){
                $mhs = biodata_mahasiswa::where('nim',$request->search)->pluck('id');
                $jaringan = nilai_jaringan::where('biodata_dosens_id',$dosen)->where('biodata_mahasiswas_id',$mhs)->paginate(10);
            }else{
                return redirect()->back()->with('pesan','Mahasiswa Tidak Ditemukan');
            }
        }

        return view('koordinator.nilai_jaringan',compact('data','jaringan','no') );
    }

    public function simpanjaringan(Request $request)
    {
        $nama = biodata_mahasiswa::where('nama','=',$request->nama)->get();
        $user = auth()->user()->id;
        $data = biodata_dosen::where('users_id',$user)->get();

        $d = biodata_mahasiswa::where('nama','=',$request->nama)->pluck('id');
        $p = nilai_android::where('biodata_mahasiswas_id',$d)->count();
        if ($p == 0) {
            $penguji = 1;
        }elseif ($p == 1) {
            $penguji = 2;
        }elseif ($p == 2) {
            $penguji = 3;
        }

        $nilai_jaringan = new nilai_jaringan;
        $nilai_jaringan -> biodata_mahasiswas_id = $nama[0]->id;
        $nilai_jaringan -> biodata_dosens_id = $data[0]->id;
        $nilai_jaringan -> penguji = $penguji;
        $nilai_jaringan -> penulisan = $request-> penulisan;
        $nilai_jaringan -> performa = $request-> performa;

        $nilai_jaringan->save();

        return redirect('/Nilai Jaringan');
    }
    public function ubahjaringan($id, Request $request)
    {
        $data = nilai_jaringan::find($id);
        $data -> update($request->all());
        return redirect('/Nilai Jaringan');
    }
    public function hapusjaringan($id)
    {
        $data = nilai_jaringan::find($id);
        $data -> delete();
        return redirect('/Nilai Jaringan');
    }

    //Nilai Sidang
    public function nilai_sidang()
    {
        $bio = biodata_mahasiswa::where('users_id',auth()->user()->id)->pluck('id');
        $data = pengajuan_judul::where('biodata_mahasiswas_id',$bio)->where('status','=','1')->pluck('bidang_minats_id');        
        $d = bidang_minat::where('id',$data)->first();

        if ($d->nm_minat == "WEB PROGRAMMING") {
           #penulisan 20%,
           #template 10%,
           #content 40%,
           #hosting 10%,
           #penguasaan 20%,
           $tes = nilai_website::where('biodata_mahasiswas_id',$bio)->count();
            
            if ($tes != 3) {
                return '<script type="text/javascript">alert("Nilai On Pogres");</script>';
            }else{
            $nilai = nilai_website::where('biodata_mahasiswas_id',$bio)->where('penguji',1)->first();

            $penulisan_1 = $nilai->penulisan*20/100;
            $template_1 = $nilai->performa*10/100;
            $content_1 = $nilai->desen_ui*40/100;
            $hosting_1 = $nilai->hasil_aplikasi*10/100;
            $penguasaan_1 = $nilai->hasil_aplikasi*20/100;

            $hasil_1 = $penulisan_1 + $template_1 + $content_1 + $hosting_1 + $penguasaan_1;

            $nilai = nilai_website::where('biodata_mahasiswas_id',$bio)->where('penguji',2)->first();

            $penulisan_2 = $nilai->penulisan*20/100;
            $template_2 = $nilai->performa*10/100;
            $content_2 = $nilai->desen_ui*40/100;
            $hosting_2 = $nilai->hasil_aplikasi*10/100;
            $penguasaan_2 = $nilai->hasil_aplikasi*20/100;

            $hasil_2 = $penulisan_2 + $template_2 + $content_2 + $hosting_2 + $penguasaan_2;

            $nilai = nilai_website::where('biodata_mahasiswas_id',$bio)->where('penguji',3)->first();

            $penulisan_3 = $nilai->penulisan*20/100;
            $template_3 = $nilai->performa*10/100;
            $content_3 = $nilai->desen_ui*40/100;
            $hosting_3 = $nilai->hasil_aplikasi*10/100;
            $penguasaan_3 = $nilai->hasil_aplikasi*20/100;

            $hasil_3 = $penulisan_3 + $template_3 + $content_3 + $hosting_3 + $penguasaan_3;
           
            $nilai_web = ($hasil_1+$hasil_2+$hasil_3)/3;
            $nilai_sidang = $nilai_web*80/100;
            
            $perbaikan = nilai_perbaikan::where('biodata_mahasiswas_id',$bio)->first();
            $nilai_perbaikan = $perbaikan->nilai_perbaikan*20/100;

            $nm = $nilai_sidang + $nilai_perbaikan;
            $hasil = number_format($nm,'2','.','');
            }
           
        }elseif ($d->nm_minat == "MOBILE PROGRAMMING") {
            #penulisan 20%,
            #performa 40%,
            #design UI 20%,
            #hasil apk 20%.
            $tes = nilai_android::where('biodata_mahasiswas_id',$bio)->count();
            $per = nilai_perbaikan::where('biodata_mahasiswas_id',$bio)->first() == null;
            
            if ( $tes != 3 || $per) {
                return '<script type="text/javascript">alert("Nilai On Pogres");</script>';
            }else{
            $nilai = nilai_android::where('biodata_mahasiswas_id',$bio)->where('penguji',1)->first();

            $penulisan_1 = $nilai->penulisan*20/100;
            $performa_1 = $nilai->performa*40/100;
            $desen_ui_1 = $nilai->desen_ui*20/100;
            $hasil_aplikasi_1 = $nilai->hasil_aplikasi*20/100;

            $hasil_1 = $penulisan_1 + $performa_1 + $desen_ui_1 + $hasil_aplikasi_1;

            $nilai = nilai_android::where('biodata_mahasiswas_id',$bio)->where('penguji',2)->first();

            $penulisan_2 = $nilai->penulisan*20/100;
            $performa_2 = $nilai->performa*40/100;
            $desen_ui_2 = $nilai->desen_ui*20/100;
            $hasil_aplikasi_2 = $nilai->hasil_aplikasi*20/100;

            $hasil_2 = $penulisan_2 + $performa_2 + $desen_ui_2 + $hasil_aplikasi_2;

            $nilai = nilai_android::where('biodata_mahasiswas_id',$bio)->where('penguji',3)->first();

            $penulisan_3 = $nilai->penulisan*20/100;
            $performa_3 = $nilai->performa*40/100;
            $desen_ui_3 = $nilai->desen_ui*20/100;
            $hasil_aplikasi_3 = $nilai->hasil_aplikasi*20/100;

            $hasil_3 = $penulisan_3 + $performa_3 + $desen_ui_3 + $hasil_aplikasi_3;
           
            $nilai_android = ($hasil_1+$hasil_2+$hasil_3)/3;
            $nilai_sidang = $nilai_android*80/100;
            
            $perbaikan = nilai_perbaikan::where('biodata_mahasiswas_id',$bio)->first();
            $nilai_perbaikan = $perbaikan->nilai_perbaikan*20/100;

            $nm = $nilai_sidang + $nilai_perbaikan;
            $hasil = number_format($nm,'2','.','');
            }
            
        }elseif ($d->nm_minat == "NETWORK") {
           #penulisan 20%,
           #performa 80%.
        $tes = nilai_jaringan::where('biodata_mahasiswas_id',$bio)->count();
        if ($tes != 3) {
            return '<script type="text/javascript">alert("Nilai On Pogres");</script>';
        }else{
        $nilai = nilai_jaringan::where('biodata_mahasiswas_id',$bio)->where('penguji',1)->first();

        $penulisan_1 = $nilai->penulisan*20/100;
        $performa_1 = $nilai->performa*80/100;

        $hasil_1 = $penulisan_1 + $performa_1;

        $nilai = nilai_jaringan::where('biodata_mahasiswas_id',$bio)->where('penguji',2)->first();

        $penulisan_2 = $nilai->penulisan*20/100;
        $performa_2 = $nilai->performa*80/100;

        $hasil_2 = $penulisan_2 + $performa_2;

        $nilai = nilai_jaringan::where('biodata_mahasiswas_id',$bio)->where('penguji',3)->first();

        $penulisan_3 = $nilai->penulisan*20/100;
        $performa_3 = $nilai->performa*80/100;

        $hasil_3 = $penulisan_3 + $performa_3;
       
        $nilai_jaringan = ($hasil_1+$hasil_2+$hasil_3)/3;
        $nilai_sidang = $nilai_jaringan*80/100;
        
        $perbaikan = nilai_perbaikan::where('biodata_mahasiswas_id',$bio)->first();
        $nilai_perbaikan = $perbaikan->nilai_perbaikan*20/100;

        $nm = $nilai_sidang + $nilai_perbaikan;
        $hasil = number_format($nm,'2','.','');
        }
        }
        return view('koordinator.nilai_sidang',compact('hasil'));
    
    }
    public function nilai_koordinator()
    {                 
            #penulisan 20%,
            #performa 40%,
            #design UI 20%,
            #hasil apk 20%.

            $android = nilai_android::select(
                'biodata_mahasiswas_id',
                nilai_android::raw('biodata_mahasiswas_id as bio'),
                nilai_android::raw('sum(penulisan)as totalpenulisan'),
                nilai_android::raw('sum(performa)as totalperforma'),
                nilai_android::raw('sum(desen_ui)as totaldesen_ui'),
                nilai_android::raw('sum(hasil_aplikasi)as totalhasil_aplikasi'),
                )
            ->groupBy('biodata_mahasiswas_id')
            ->get();

            #penulisan 20%,
            #template 10%,
            #content 40%,
            #hosting 10%,
            #penguasaan 20%,
            $web = nilai_website::select(
                'biodata_mahasiswas_id',
                nilai_website::raw('biodata_mahasiswas_id as bio'),
                nilai_website::raw('sum(penulisan)as totalpenulisan'),
                nilai_website::raw('sum(template)as totaltemplate'),
                nilai_website::raw('sum(konten)as totalkontent'),
                nilai_website::raw('sum(hosting)as totalhosting'),
                nilai_website::raw('sum(penguasaan_project)as totalpenguasaan'),
                )
            ->groupBy('biodata_mahasiswas_id')
            ->get();

            #penulisan 20%,
            #performa 80%.

            $jaringan = nilai_jaringan::select(
                'biodata_mahasiswas_id',
                nilai_jaringan::raw('biodata_mahasiswas_id as bio'),
                nilai_jaringan::raw('sum(penulisan)as totalpenulisan'),
                nilai_jaringan::raw('sum(performa)as totalperforma'),
                )
            ->groupBy('biodata_mahasiswas_id')
            ->get();

            $no_1 = 1;
            $no_2 = 1;
            $no_3 = 1;
            $mhsandroid = $android->count();
            $mhsweb = $web->count();
            $mhsjaringan = $jaringan->count();

        return view('koordinator.nilai',compact('no_1','no_2','no_3','android','web','jaringan','mhsandroid','mhsjaringan','mhsweb'));
    }
}
