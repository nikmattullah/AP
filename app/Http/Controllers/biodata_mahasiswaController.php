<?php

namespace App\Http\Controllers;

use App\Models\biodata_dosen;
use Illuminate\Http\Request;
use App\Models\biodata_mahasiswa;
use App\Models\jurusan;
use App\Models\tahun_ajaran;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;

class biodata_mahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user()->id;
        $no = 1;
        $jurusan = jurusan::all();
        $tahun_ajaran = tahun_ajaran::all();
        $data = biodata_mahasiswa::where('users_id',$user)->first();
        return view('koordinator.biodata_mahasiswa',compact('jurusan','tahun_ajaran','data','no'));
    }
    
    public function store(Request $request)
    {
        biodata_mahasiswa::create($request->all());
       return redirect('/');
    }

    public  function update($id, Request $request)
    {
        $data = biodata_mahasiswa::find($id);
        $data -> update($request->all());
        return redirect('/Biodata Mahasiswa');
    }

    public function create ()
    {
        $jurusan = jurusan::all();
        $tahun_ajaran = tahun_ajaran::all();
        return view('koordinator.form_biodata_mahasiswa',compact('jurusan','tahun_ajaran'));
    }
}
