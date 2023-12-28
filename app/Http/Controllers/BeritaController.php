<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $data['berita'] = Berita::all();
        return view('admin.page.berita.berita',$data);
    }
    public function indexjurnalis()
    {
        $data['berita'] = Berita::where( 'nama_publisher', '=', Auth::user()->name )->get();
        return view('admin.page.berita.berita',$data);
    }
    public function tambah_berita()
    {
        $data['kategori'] = Kategori::all();
        return view('admin.page.berita.tambah_berita', $data);
    }
    public function tambah_data_berita(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'waktu_publish' => 'required',
            'keterangan' => 'required',
        ]);

        $file = request()->image;
        foreach($file as $multi_img){
            $file_name = Str::random(15).'-'.$multi_img->getClientOriginalName();
            $tujuan_upload = 'image/berita';
            $multi_img->move($tujuan_upload,$file_name);
            // $lastimg = $tujuan_upload.$file_name;

            $data = [
                'id_kategori' => request()->kategori,
                'id' => Auth::user()->id,
                'image' => $file_name,
                'judul' => request()->judul,
                'isi' => request()->isi,
                'waktu_publish' => request()->waktu_publish,
                'keterangan' => request()->keterangan,
                'nama_publisher' => Auth::user()->name,
            ];

            Berita::insert($data);
        }
     
        
        if(Auth::user()->level == 'admin'){
            return redirect()->to('/admin/semua_berita')->with('success','upload sucessfully');
        }
        elseif(Auth::user()->level == 'jurnalis'){
            return redirect()->to('/jurnalis/semua_berita')->with('success','upload sucessfully');
        }
    }
    public function lihat_berita($id_berita)
    {

        $data['berita'] = Berita::where('id_berita',$id_berita)->first();
        return view('admin.page.berita.lihat_berita',$data);
    }
    public function ubah_berita($id_berita)
    {
        $data['kategori'] = Kategori::all();
        $data['berita'] = Berita::where('id_berita',$id_berita)->first();
        return view('admin.page.berita.ubah_berita',$data);
    }
    public function ubah_data_berita(Request $request)
    {

        $file = request()->image;
        if ($file) {
            $file_name = Str::random(25).'-'.$file->getClientOriginalName();
            $tujuan_upload = 'image/berita';
            $file->move($tujuan_upload,$file_name);
    
            $tmp = public_path('image/berita/'.request()->old_image);
            if(file_exists($tmp)){
                unlink($tmp);
            }
        }else{
            $file_name = request()->old_image;
        }
        
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'waktu_publish' => 'required',
            'keterangan' => 'required',
            'nama_publisher' => 'required',
        ]);

        Berita::where('id_berita',request()->id_berita)->update([
            'id_kategori' => request()->kategori,
            'image' => $file_name,
            'judul' => request()->judul,
            'isi' => request()->isi,
            'waktu_publish' => request()->waktu_publish,
            'keterangan' => request()->keterangan,
            'nama_publisher' => request()->nama_publisher,
        ]);
        if(Auth::user()->level == 'admin'){
            return redirect()->to('/admin/semua_berita')->with('update','update sucessfully');
        }
        elseif(Auth::user()->level == 'jurnalis'){
            return redirect()->to('/jurnalis/semua_berita')->with('update','update sucessfully');
        };
    }
    public function hapus_berita($id_berita)
    {
        $data = Berita::where('id_berita',$id_berita)->first();
        $image_path = public_path('image/berita/'.$data->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        
        Berita::where('id_berita',$id_berita)->delete();

        if(Auth::user()->level == 'admin'){
            return redirect()->to('/admin/semua_berita')->with('delete','delete sucessfully');
        }
        elseif(Auth::user()->level == 'jurnalis'){
            return redirect()->to('/jurnalis/semua_berita')->with('delete','delete sucessfully');
        }
    }
}
