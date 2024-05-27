<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang_hilang;
use App\Models\barang_temuan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class BarangController extends Controller
{
    public function home()
    {
        $laporan = barang_temuan::all();
        $hitung = barang_temuan::count();
        $hitung2 = barang_hilang::count();
        return view('homepage', ['laporan_hilang' => $laporan, 'id' => Auth::id(), 'count1' => $hitung, 'count2' => $hitung2]);
    }

    
    public function homeadd()
    {
        return view('tambahbarang', ['id' => Auth::id()]);
    }
    
    public function homeprocess(Request $request)
    {
        $data = $request->validate([
            'nama_barang' => ['required', 'max:255', 'string'],
            'foto_barang' => 'required',
            'lokasi' =>  'required',
            'deskripsi' =>'required',
            'phone' =>'required',
            'user_id' =>'required'
        ]);
        $barang = barang_temuan::create($data);
        
        if($request->has('foto_barang')){
            $file = $request->file('foto_barang');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'. $extension;
            $file-> move('temuan/',$filename);
            $barang->foto_barang = $filename;
            $barang->save();
        }
        
        return redirect()->route('home.index');
    }

    public function homedetail(barang_temuan $barang){
        return view('detailtemuan', ['barang' => $barang, 'id' => Auth::id()]);
    }

    public function homeedit(barang_temuan $barang, Request $request){
        $data = $request->validate([
            'nama_barang' => ['required', 'max:255', 'string'],
            'lokasi' =>  'required',
            'foto_barang' => 'required',
            'deskripsi' =>'required',
            'phone' =>'required'
        ]);

        File::delete('temuan/'.$barang->foto_barang);
        $barang->update($data);
        if($request->has('foto_barang')){
            $file = $request->file('foto_barang');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'. $extension;
            $file-> move('temuan/',$filename);
            $barang->foto_barang = $filename;
            $barang->update([
                'foto_barang' => $filename
            ]);
        }

        return redirect()->route('home.detail', ['barang' => $barang]);
    }

    public function homedelete(barang_temuan $barang){
        File::delete('temuan/'.$barang->foto_barang);
        $barang->delete();
        return redirect()->route('home.index');
    }

    public function hilang()
    {
        $laporan = barang_hilang::all();
        $hitung = barang_temuan::count();
        $hitung2 = barang_hilang::count();
        return view('laporankehilangan', ['laporan_hilang' => $laporan, 'id' => Auth::id(), 'count1' => $hitung, 'count2' => $hitung2]);
    }
    
    public function hiadd()
    {
        return view('tambahlaporkehilangan', ['id' => Auth::id()]);
    }

    public function hiprocess(Request $request)
    {
        $data = $request->validate([
            'nama_barang' => ['required', 'max:255', 'string'],
            'foto_barang' => 'required',
            'lokasi' =>  'required',
            'deskripsi' =>'required',
            'phone' =>'required',
            'user_id' => 'required'
        ]);
        $barang = barang_hilang::create($data);
        
        if($request->has('foto_barang')){
            $file = $request->file('foto_barang');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'. $extension;
            $file-> move('hilang/',$filename);
            $barang->foto_barang = $filename;
            $barang->save();
        }

        return redirect()->route('hilang.index');
    }

    public function hidetail(barang_hilang $barang){
        return view('detailhilang', ['barang' => $barang, 'id' => Auth::id()]);
    }

    public function hiedit(barang_hilang $barang, Request $request){
        $data = $request->validate([
            'nama_barang' => ['required', 'max:255', 'string'],
            'lokasi' =>  'required',
            'foto_barang' => 'required',
            'deskripsi' =>'required',
            'phone' =>'required'
        ]);

        File::delete('hilang/'.$barang->foto_barang);
        $barang->update($data);
        if($request->has('foto_barang')){
            $file = $request->file('foto_barang');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'. $extension;
            $file-> move('hilang/',$filename);
            $barang->foto_barang = $filename;
            $barang->update([
                'foto_barang' => $filename
            ]);
        }

        return redirect()->route('hilang.detail', ['barang' => $barang]);
    }

    public function hidelete(barang_hilang $barang){
        File::delete('hilang/'.$barang->foto_barang);
        $barang->delete();
        return redirect()->route('hilang.index');
    }
}
