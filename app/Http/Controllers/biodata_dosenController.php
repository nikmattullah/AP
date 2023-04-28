<?php

namespace App\Http\Controllers;

use App\Models\biodata_dosen;
use Illuminate\Http\Request;

class biodata_dosenController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user()->id;
        $no = 1;
        $data = biodata_dosen::where('users_id',$user)->first();
        return view('koordinator.biodata_dosen',compact('data','no'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kd_instruktur' => ['required', 'string', 'max:255'],
            'nama'=>['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tgl_lahir' => ['required', 'date'],
            'alamat' => ['required'],
            'no_hp' => ['required','max:13'],
            'jenis_kelamin' => ['required'],
        ]);
        biodata_dosen::create($request->all());
       return redirect('/Biodata Dosen');
    }

    public  function update($id, Request $request)
    {
        $data = biodata_dosen::find($id);
        $data -> update($request->all());
        return redirect('/Biodata Dosen');
    }

    public function create ()
    {
        return view('koordinator.form_biodata_dosen');
    }
}
