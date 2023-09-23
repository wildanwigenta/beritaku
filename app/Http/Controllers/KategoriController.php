<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function index()
    {
        $data['kategori'] = Kategori::all();
        return view('admin.page.kategori.kategori',$data);
    }
    public function tambah_kategori()
    {
        return view('admin.page.kategori.tambah_kategori');
    }
    public function tambah_data_kategori(Request $request )
    {
        $request->validate([
            'kategori' => 'required',
        ]);

        $data = [
            'kategori' => request()->kategori,
        ];
        Kategori::insert($data);
        if(Auth::user()->level == 'admin'){
            return redirect()->to('/admin/kategori_berita')->with('success','Kategori berhasil ditambahkan');
        }
        elseif(Auth::user()->level == 'jurnalis'){
            return redirect()->to('/jurnalis/kategori_berita')->with('success','Kategori berhasil ditambahkan');
        }
    }
    public function ubah_kategori($id_kategori)
    {
        $data['kategori']=Kategori::where('id_kategori', $id_kategori)->first();
        return view('admin.page.kategori.ubah_kategori', $data);
    }
    public function ubah_data_kategori(Request $request,$id_kategori)
    {
        // dd($request);
        $request->validate([
            'kategori' => 'required',
        ]);
        
        Kategori::where('id_kategori',$id_kategori)->update([
            'kategori' => request()->kategori,
        ]);

        if(Auth::user()->level == 'admin'){
            return redirect()->to('/admin/kategori_berita')->with('update','update sucessfully');
        }
        elseif(Auth::user()->level == 'jurnalis'){
            return redirect()->to('/jurnalis/kategori_berita')->with('update','update sucessfully');
        };
    }
    public function hapus_kategori($id_kategori)
    {
        Kategori::where('id_kategori',$id_kategori)->delete();

        if(Auth::user()->level == 'admin'){
            return redirect()->to('/admin/kategori_berita')->with('delete','delete sucessfully');
        }
        elseif(Auth::user()->level == 'jurnalis'){
            return redirect()->to('/jurnalis/kategori_berita')->with('delete','delete sucessfully');
        }
    }
}

