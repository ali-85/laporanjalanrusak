<?php

namespace App\Http\Controllers;

use App\User;
use App\Laporan;
use App\Desa;
use App\Kecamatan;
use App\Ditolak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\If_;

class AdminController extends Controller
{
    public function index()
    {   
        $user = User::count();
        $laporan = Laporan::count();
        $pending = Laporan::where('status','pending')->count();
        $proses = Laporan::where('status','Diproses')->count();
        $selesai = Laporan::where('status','Selesai')->count();
        $tolak = Laporan::where('status','Ditolak')->count();
        return view('admin.index')
                    ->withUser($user)
                    ->withLaporan($laporan)
                    ->withPending($pending)
                    ->withSelesai($selesai)
                    ->withProses($proses)
                    ->withTolak($tolak);
    }
    public function getLaporan()
    {
        $laporan = Laporan::where('status','pending')->get();
        return view('admin.pending')
                    ->withLaporan($laporan);
    }
    public function storeData($id)
    {
        $lapor = Laporan::find($id);
        $lapor->status = 'diproses';
        $lapor->save();
        return redirect()->route('admin.laporan')->with('success','Data Diterima!');
    }
    public function storeLapor($id)
    {
        $lapor = Laporan::find($id);
        $lapor->status = 'Selesai';
        $lapor->save();
        return redirect()->route('admin.laporan')->with('success','Ajuan Selesai!');
    }
    public function storeTolak(Request $request, $id)
    {
        if($request->input('alasan') == NULL){
            return redirect()->route('admin.laporan')->with('danger','Form Alasan Harus Diisi!');
        } else {
            $lapor = Laporan::find($id);
            $lapor->status = 'Ditolak';
            $lapor->save();
            $tolak = new Ditolak([
                'laporan_id' => $id,
                'alasan' => $request->input('alasan')
            ]);
            $tolak->Save();
            return redirect()->route('admin.laporan')->with('success','Laporan Ditolak!');
        }
    }
    public function getDetail($id)
    {
        $laporan = DB::table('laporans as l')->join('kecamatans as k','l.kecamatan','=','k.id')
                    ->where('l.id',$id)
                    ->select('l.*','k.nama as namakecamatan')->get();
        return view('admin.detail',['laporan' => $laporan]);
    }
    public function getProses()
    {
        $laporan = Laporan::where('status','diproses')->get();
        return view('admin.proses')
                    ->withLaporan($laporan);
    }
    public function getSelesai()
    {
        $laporan = Laporan::where('status','Selesai')->get();
        return view('admin.selesai')
                    ->withLaporan($laporan);
    }
    public function getTolak()
    {
        $laporan = Laporan::where('status','Ditolak')->get();
        return view('admin.tolak')
                    ->withLaporan($laporan);
    }
    public function batalTolak($id)
    {
        $lapor = Laporan::find($id);
        DB::table('ditolaks')->where('laporan_id',$id)->delete();
        $lapor->status = 'pending';
        $lapor->save();
        return redirect()->route('admin.laporan')->with('success','Berhasil Mengembalikan Laporan yang ditolak!');
    }
    public function getSemua()
    {
        $laporan = Laporan::all();
        return view('admin.semua')
                    ->withLaporan($laporan);
    }
    public function getUser()
    {
        $user = User::all();
        return view('admin.user')
                    ->withUser($user);
    }
    public function getDesa()
    {
        $kcmtn = Kecamatan::orderBy('nama','asc')->get();
        $desa = DB::table('desas as d')->join('kecamatans as k','d.kecamatan_id','=', 'k.id')
                ->select('d.*','k.nama as namakecamatan')->orderBy('namakecamatan','asc')->paginate(10);
        $data = Desa::count();
        return view('admin.daerah.desa',['desa' => $desa,'kcmtn' => $kcmtn,'data' => $data]);
    }
    public function searchDesa(Request $request)
    {
        $kcmtn = Kecamatan::orderBy('nama','ASC')->get();
        $query = $request->input('key');
        If($request->input('key') != ''){
            $data = Desa::where('nama','LIKE','%'.$query.'%')->count();
            $desa = DB::table('desas as d')->join('kecamatans as k','d.kecamatan_id','=', 'k.id')
                ->where('d.nama','LIKE','%'.$query.'%')
                ->orWhere('k.nama','LIKE','%'.$query.'%')
                ->select('d.*','k.nama as namakecamatan')
                ->orderBy('namakecamatan','asc')->paginate(10);
        } else {
            $data = Desa::all()->count();
            $desa = DB::table('desas as d')->join('kecamatans as k','d.kecamatan_id','=', 'k.id')
                ->select('d.*','k.nama as namakecamatan')->orderBy('namakecamatan','asc')->paginate(10);
        }
        return view('admin.daerah.desa',['desa' => $desa,'kcmtn' => $kcmtn,'data' => $data]);
    }
    /*public function fetch_desa(Request $request)
    {
        if($request->ajax())
        {
        $desa = Desa::orderBy('kecamatan_id','ASC')->paginate(10);
        return view('admin.daerah.desa', compact('desa'))->render();
        }
    }*/
    public function storeDesa(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'kecamatan_id' => 'required'
        ]);
        $desa = new Desa([
            'nama' => $request->input('nama'),
            'kecamatan_id' => $request->input('kecamatan_id')
        ]);
        $desa->save();
        return redirect()->route('admin.desa')->with('success','Berhasil menambahkan Data Desa!');
    }
    public function editDesa(Request $request)
    {
        if($request->ajax())
        {
            $desa = Desa::where('id', $request->id)->first();
            return response()->json($desa);
        }
    }
    public function updateDesa(Request $request,$id)
    {
        $desa = Desa::find($id);
        $desa->nama = $request->input('nama');
        $desa->kecamatan_id = $request->input('kecamatan_id');

        $desa->save();
        return redirect()->route('admin.desa')->with('success','Berhasil mengubah Data Desa!');
    }
    public function hapusDesa($id)
    {
        $desa = Desa::find($id);
        $desa->Delete();
        return redirect()->route('admin.desa')->with('success','Berhasil menghapus Data Desa!');
    }
    public function getKcmtn()
    {
        $count = Kecamatan::count();
        $data = Kecamatan::orderBy('nama','asc')->paginate(10);
        return view('admin.daerah.kcmtn',['data' => $data,'count'=>$count]);
    }
    public function storeCamat(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required'
        ]);
        $camat = new Kecamatan([
            'nama' => $request->input('nama')
        ]);
        $camat->save();
        return redirect()->route('admin.kcmtn')->with('success','Berhasil menambahkan Data Kecamatan!');
    }
    public function editKcmtn(Request $request)
    {
        if($request->ajax())
        {
            $kcmtn = Kecamatan::where('id', $request->id)->first();
            return response()->json($kcmtn);
        }
    }
    public function updateKcmtn(Request $request,$id)
    {
        $kcmtn = Kecamatan::find($id);
        $kcmtn->nama = $request->input('nama');
        $kcmtn->save();
        return redirect()->route('admin.kcmtn')->with('success','Berhasil mengubah Data Kecamatan!');
    }
    public function hapusKcmtn($id)
    {
        $kcmtn = Kecamatan::find($id);
        Desa::where('kecamatan_id',$id)->delete();
        $kcmtn->Delete();
        return redirect()->route('admin.kcmtn')->with('success','Berhasil menghapus Data Kecamatan!');
    }
    public function tambahUser(Request $request)
    {
        if($request->input('email') == User::all(['email'])->toArray()){
            return redirect()->back()->with('danger','Email sudah terdaftar. silahkan Login!');
        } else {
            $user = new User([
                'name' => $request->input('nama'),
                'email' => $request->input('email'),
                'nohp' => $request->input('nohp'),
                'role' => $request->input('role'),
                'password' => bcrypt($request->input('password'))
            ]);
            $user->save();
            return redirect()->route('admin.user')->with('success','Berhasil Menambah Data Pengguna!');
        }
    }
    public function editUser(Request $request)
    {
        if($request->ajax())
        {
            $user = User::where('id', $request->id)->first();
            return response()->json($user);
        }
    }
    public function ubahUser(Request $request,$id)
    {
        if(empty($request->input('password'))){
            $user = User::find($id);
            $user->name = $request->input('nama');
            $user->email = $request->input('email');
            $user->nohp = $request->input('nohp');
            $user->role = $request->input('role');
        } else {
            $user = User::find($id);
            $user->name = $request->input('nama');
            $user->email = $request->input('email');
            $user->nohp = $request->input('nohp');
            $user->role = $request->input('role');
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();
        return redirect()->route('admin.user')->with('user',$user)->with('success','Berhasil mengubah Data Pengguna!');
    }
    public function userDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user')->with('success','Berhasil menghapus Data Pengguna!');
    }
}
