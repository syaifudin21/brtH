<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Models\Iklan;

class IklanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $iklans = Iklan::orderBy('id', 'DESC')->paginate(20);
    	return view('admin.iklan', compact('iklans'));
    }
    public function create()
    {
        return view('admin.iklan-tambah');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $iklan = new Iklan();
        $iklan->fill($request->all());
        if($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'iklan');
            $iklan['foto'] = $upload['url'];
        }
        $iklan->save();

        if($iklan){
            return redirect(route('admin.iklan'))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    //     ]);

    //     $iklan = new iklan();
    //     $iklan['reporter_id'] = '0';
    //     if($request->hasFile('file')){
    //         $upload = app('App\Helper\Images')->upload($request->file('file'), 'galeri');
    //         $iklan['iklan'] = $upload['url'];
    //     }
    //     $iklan->save();

    // }

    public function edit($id)
    {
        $iklan = Iklan::findOrFail($id);
        return view('admin.iklan-edit', compact('iklan'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $iklan =Iklan::findOrFail($request->id);
        $iklan->fill($request->all());
        if($request->hasFile('foto')){
            $ikland =Iklan::findOrFail($request->id);
            File::delete($ikland->iklan);

            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'iklan');
            $iklan['foto'] = $upload['url'];
        }
        $iklan->save();

        if($iklan){
            return redirect($request->redirect)
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function publish()
    {
        $iklan = Iklan::find($_GET['id']);
        if ($iklan->publish == 'Public') {
            $iklan['publish'] = 'Private';
        }else{
            $iklan['publish'] = 'Public';
        }
        $iklan->save();
        return response(['kode'=> '00', 'publish' => $iklan->publish]);
    }
    public function verifikasi()
    {
        $iklan = Iklan::find($_GET['id']);
        if ($iklan->status == 'Verifikasi') {
            $iklan['status'] = 'Block';
        }else{
            $iklan['status'] = 'Verifikasi';
        }
        $iklan->save();
        return response(['kode'=> '00', 'status' => $iklan->status]);
    }
    public function delete($id)
    {
        $iklan = Iklan::findOrFail($id);
        if (!empty($iklan)) {
            File::delete($iklan->iklan);
            $iklan->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
