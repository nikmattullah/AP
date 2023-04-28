<?php

namespace App\Http\Controllers;

use App\Models\biodata_mahasiswa;
use Illuminate\Http\Request;
use App\Models\upload_file;
use Dotenv\Validator;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Util\MimeType;

class upload_fileController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;
        $biodata = biodata_mahasiswa::where('users_id',$user)->first();
        $ambil_id_mhs = $biodata->where('users_id',$user)->pluck('id');
        $id_mhs = upload_file::where('biodata_mahasiswas_id',$ambil_id_mhs)->first();
        
        return view('koordinator.upload_file',compact('id_mhs'));
    }
    public function create()
    {
        return view('koordinator.create-upload-file');
    }

    public function store(Request $request)
    {
        $user = auth()->user()->id;
        $id_mhs = biodata_mahasiswa::where('users_id',$user)->get();

        $validatedData = $request->validate([
            'penulisan' => 'mimes:pdf',
            'judul_penulisan' => 'required',
            //'video'     => 'required|mimes:mp4',   
        ]);
        
        //penulisan
        $fileNamepenulisan = $request->penulisan->getClientOriginalName();
        $filePathpenulisan = 'File-Mahasiswa/' . $fileNamepenulisan;
        $isFileUploaded = Storage::disk('public')->put($filePathpenulisan, file_get_contents($request->penulisan));

        //video
        // $fileNamevideo = $request->video->getClientOriginalName();
        // $filePathvideo = 'File-Video/' . $fileNamevideo;
        // $isFileUploaded = Storage::disk('public')->put($filePathvideo, file_get_contents($request->video));

        
        $validatedData['penulisan'] = $fileNamepenulisan;
        $validatedData['biodata_mahasiswas_id'] = $id_mhs[0]->id;
        $validatedData['judul_penulisan'] = $request->judul_penulisan;

        upload_file::create($validatedData);
        return redirect('/Upload File');
        
    }
    public function edit($id)
    {
        $data = upload_file::where('id',$id)->first();
        return view('koordinator.edit-upload-file',compact('data'));
    }
    public function update($id,Request $request)
    {
        $validatedData = $request->validate([
            'penulisan' => 'mimes:pdf',
            'judul_penulisan' => 'required',
        ]);   

        //penulisan
        $fileNamepenulisan = $request->penulisan->getClientOriginalName();
        $filePathpenulisan = 'File-Mahasiswa/' . $fileNamepenulisan;
        $isFileUploaded = Storage::disk('public')->put($filePathpenulisan, file_get_contents($request->penulisan));

        $validatedData['penulisan'] = $fileNamepenulisan;
        $validatedData['judul_penulisan'] = $request->judul_penulisan;

        $data = upload_file::find($id);
        $data -> update($validatedData);
        return redirect('/Upload File');
    }
}




// $this->validate($request, [
//     'title' => 'required|string|max:255',
//     'video' => 'mimetypes:video/mp4',
// ]);

// $fileName = $request->video->getClientOriginalName();
// $filePath = 'videos/' . $fileName;

// $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));

//     // File URL to access the video in frontend
//    $url = Storage::disk('public')->url($filePath);

// if ($isFileUploaded) {
//     $video = new upload_file();
//     $video->title = $request->title;
//     $video->path = $filePath;
//     $video->save();

//     return back()
//     ->with('success','Video has been successfully uploaded.');
// }

// return back()
//     ->with('error','Unexpected error occured');