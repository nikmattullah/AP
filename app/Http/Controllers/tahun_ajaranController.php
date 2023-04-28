<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tahun_ajaran;

class tahun_ajaranController extends Controller
{
    public function index (){
        $no = 1;
        $data =  tahun_ajaran::all();
        return view ('koordinator.tahun_ajaran',compact('data','no'));

    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahun_ajaran' => ['required','min:4','integer'],
        ]);

        tahun_ajaran::create($request->all());
        return redirect('/Tahun Ajaran');
    }
    
    public function destroy($id)
    {
        $data = tahun_ajaran::find($id);
        $data->delete();
        return redirect('/Tahun Ajaran');
    }
    
    public function update($id, Request $request)
    {
        $data = tahun_ajaran::find($id);
        $data -> update($request->all());
        return redirect('/Tahun Ajaran');
    }
}
