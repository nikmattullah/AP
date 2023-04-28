<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\biodata_mahasiswa;
use App\Models\jurusan;
use App\Models\tahun_ajaran;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'level'=>['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nim' => ['required'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tgl_lahir' => ['required', 'date'],
            'alamat' => ['required'],
            'no_hp' => ['required','max:13'],
            'jenis_kelamin' => ['required'],
            'kelas' => ['required','integer'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {
        $user = new User;
        $user->name = $data['name'];
        $user->level = $data['level'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
        // return User::create([
        //     'name' => $data['name'],
        //     'level'=>$data['level'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);

        $id = User::where('email',$data['email'])->get();
        $jurusan = jurusan::max('id');
        $tahun = tahun_ajaran::max('id');

        $bio = new biodata_mahasiswa;
        $bio->users_id = $id[0]->id;
        $bio->nim = $data['nim'];
        $bio->nama = $data['name'];
        $bio->tempat_lahir = $data['tempat_lahir'];
        $bio->tgl_lahir = $data['tgl_lahir'];
        $bio->alamat = $data['alamat'];
        $bio->no_hp = $data['no_hp'];
        $bio->email = $data['email'];
        $bio->jenis_kelamin = $data['jenis_kelamin'];
        $bio->kelas = $data['kelas'];
        $bio->jurusans_id = $jurusan;
        $bio->tahun_ajaran_id = $tahun;
        $bio->save();
        
        return redirect('/');
    }
}
