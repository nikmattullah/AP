<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bidang_minat;
use Whoops\Run;

class bidang_minatController extends Controller
{
    public function index()
    {
      $no = 1;  
      $data = bidang_minat::all();
      return view ('koordinator.bidang_minat',compact('data','no'));
    }

    public function store(Request $request)
    {
        bidang_minat::create($request->all());
        return redirect('/Bidang Minat');
    }
    public function update($id, Request $request)
    {
      $data = bidang_minat::find($id);
      $data -> update($request->all());
      return redirect('/Bidang Minat');
    }
    public function destroy($id)
    {
      $data = bidang_minat::find($id);
      $data->delete();
      return redirect('/Bidang Minat');
    }
}