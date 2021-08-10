<?php

namespace App\Http\Controllers;

use App\User;
use App\Laporan;
use App\Kecamatan;
use App\Desa;
use App\Ditolak;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth as IlluminateAuth;

class UserController extends Controller
{
    public function index()
    {
        $kcmtn = Kecamatan::orderBy('nama','ASC')->get();
        return view('home.index',['kcmtn' => $kcmtn]);
    }
    public function findDesa(Request $request)
    {
        $data = Desa::where('kecamatan_id',$request->id)->orderBy('nama','ASC')->get();
        return response()->json($data);
    }
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password'),'role' => 1])){
            return Redirect()->route('admin.index')->with(['success' => 'berhasil login!']);
        }elseif(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password'),'role' => 0])){
            return redirect()->route('index')->with(['success' => 'Berhasil Login! Silahkan Lapor!']);
        } else {
            return Redirect()->back()->with('danger','Password atau email salah !');
        }
    }
    public function getSignup()
    {
        return view('auth.signup');
    }
    public function postSignup(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'nohp' => 'numeric|required',
            'email' => 'email|required',
            'password1' => 'required|min:6',
            'password2' => 'required|same:password1'
        ]);
        if($request->input('email') == User::all(['email'])->toArray()){
            return redirect()->back()->with('danger','Email sudah terdaftar. silahkan Login!');
        } else {
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'nohp' => $request->input('nohp'),
            'password' => bcrypt($request->input('password1'))
        ]);
            $user->save();
            return redirect()->route('login')->with('success','Akun Berhasil dibuat. Silahkan Login!');
        }
    }
    public function postLapor(Request $request)
    {
        if(Auth::check() == false){
            $request->flash();
            return redirect()->route('login')->withInput();
        } else {
        $lapor = new Laporan([
            'user_id' => Auth::id(),
            'nama' => Auth::user()->name,
            'nohp' => Auth::user()->nohp,
            'alamat' => $request->input('alamat'),
            'kecamatan' => $request->input('kecamatan'),
            'desa' => $request->input('desa'),
            'note' => $request->input('note')
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('img/',$filename);
            $lapor->image = $filename;
        } else {
            return $request;
            $lapor->image = '';
        }

        $lapor->save();
        return redirect()->route('index')->with('success','Laporan berhasil dikirim!');
        }
    }
    public function getLaporan()
    {
        $kcmtn = Kecamatan::all();
        $data = Laporan::where('user_id',Auth::id())->get();
        return view('home.laporan',['data' => $data,'kcmtn' => $kcmtn]);
    }
    public function getAlasan($id)
    {
        $data = Ditolak::where('laporan_id',$id)->get();
        return view('home.alasan',['data' => $data]);
    }
    public function getDetail($id)
    {
        $kcmtn = Kecamatan::all();
        $laporan = Laporan::where('id',$id)->get();
        return view('home.detail',['laporan' => $laporan,'kcmtn' => $kcmtn]);
    }
    public function getLogout()
    {
        Auth::logout();
        return Redirect()->route('index')->with('success','Anda Berhasil Keluar akun!');
    }
}
