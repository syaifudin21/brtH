<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Literasi;
use File;

class LiterasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $literasis = Literasi::orderBy('id', 'DESC')->get();
    	return view('admin.literasi', compact('literasis'));
    }

    public function create()
    {
        return view('admin.literasi-tambah');
    }
    public function show($id)
    {
        $literasi = Literasi::find($id);
        return view('admin.literasi-show', compact('literasi'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'artikel' => 'required|string',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'caption' => 'required|string|max:255',
        ]);

        $literasi = new Literasi();
        $literasi->fill($request->all());
        $literasi['dilihat'] = '0';
        $literasi['reporter_id'] = '0';
        if($request->hasFile('gambar')){
            $upload = app('App\Helper\Images')->upload($request->file('gambar'), 'literasi');
            $literasi['gambar'] = $upload['url'];
        }
        $literasi['slug'] = str_slug($request->judul, '-');
        $literasi->save();

        if($literasi){
            return redirect(route('admin.literasi.show',['id'=> $literasi->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function edit($id)
    {
        $literasi = Literasi::findOrFail($id);
        return view('admin.literasi-edit', compact('literasi'));
    }
    public function publish()
    {
        $literasi = Literasi::find($_GET['id']);
        if ($literasi->publish == 'Public') {
            $literasi['publish'] = 'Private';
        }else{
            $literasi['publish'] = 'Public';
        }
        $literasi->save();
        return response(['kode'=> '00', 'publish' => $literasi->publish]);
    }
    public function verifikasi()
    {
        $literasi = Literasi::find($_GET['id']);
        if ($literasi->status == 'Verifikasi') {
            $literasi['status'] = 'Block';
        }else{
            $literasi['status'] = 'Verifikasi';
        }
        $literasi->save();
        return response(['kode'=> '00', 'status' => $literasi->status]);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'artikel' => 'required|string',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'caption' => 'required|string|max:255',
        ]);

        $literasi =Literasi::findOrFail($request->id);
        $literasi->fill($request->all());
        if($request->hasFile('gambar')){
            $literasid =Literasi::findOrFail($request->id);
            File::delete($literasid->gambar);

            $upload = app('App\Helper\Images')->upload($request->file('gambar'), 'literasi');
            $literasi['gambar'] = $upload['url'];
        }
        $literasi['slug'] = str_slug($request->judul, '-');
        $literasi->save();

        if($literasi){
            return redirect($request->redirect)
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function delete($id)
    {
        $literasi = Literasi::findOrFail($id);
        if (!empty($literasi)) {
            File::delete($literasi->gambar);
            $literasi->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
