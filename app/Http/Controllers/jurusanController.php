<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jurusan;
use Whoops\Run;

class jurusanController extends Controller
{
    public function index ()
    {
        $no = 1;
        $data = jurusan::all();
        return view('koordinator.jurusan',compact('data','no'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kd_jurusan' => ['required','string'],
            'nm_jurusan' => ['required','string'],
        ]);
        
        $data = new jurusan;
        $data->kd_jurusan = $request->kd_jurusan;
        $data->nm_jurusan = $request->nm_jurusan;
        $data->save();
        return redirect('/Jurusan');
    }
    public function destroy ($id)
    {
        $data = jurusan::find($id);
        $data -> delete();
        return redirect('/Jurusan');
    }
    public function update($id, Request $request)
    {
        $data = jurusan::find($id);
        $data -> update($request->all());
        return redirect('/Jurusan');
    }
}
