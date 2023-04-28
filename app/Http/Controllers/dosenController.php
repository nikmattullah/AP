<?php

namespace App\Http\Controllers;

use App\Http\Middleware\level;
use App\Models\biodata_dosen;
use Illuminate\Http\Request;
use App\Models\dosen;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Whoops\Run;

class dosenController extends Controller
{
    public function index()
    {
        return view('koordinator.dosen');
    }

    public function search(Request $request)
    {
        $data = User::where('level','=','dosen')->get();
        if($request->keyword != ''){
        $data = User::where('level','=','dosen')->where('name','LIKE','%'.$request->keyword.'%')->get();
        }
        return response()->json([
           'employees' => $data
        ]);
    }

    public function store(Request $request)
    {
        $data = new User;
        $data -> name = $request -> name;
        $data -> level = $request -> level;
        $data -> email = $request -> email;
        $data -> password = Hash::make($request -> password);
        $data->save();
        return redirect('/Dosen');
    }
}
