<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Video;
use App\Models\Literasi;
use App\Models\Foto;
use App\Models\Atribut;
use App\Models\Album;
use App\Models\Iklan;

class HomeController extends Controller
{
    public function index()
    {
        $datenow = date('Y-m-d');

        $iklan1 = Iklan::where('spase',1)
                ->where('start_date', '<=', $datenow)
                ->where('end_date', '>=', $datenow)
                ->first();
        
        $videos = Video::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('created_at', 'DESC')->limit(4)->get();
        $beritas = Berita::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('created_at', 'DESC')->limit(10)->get();
        $beritavs = Berita::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('dilihat', 'DESC')->limit(10)->get();
        $albums = Album::where(['publish'=> 'Public','status'=>'Verifikasi'])->orderBy('id', 'DESC')->limit(5)->get();
        $literasis = Literasi::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('created_at', 'DESC')->limit(10)->get();
        $literasivs = Literasi::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('dilihat', 'DESC')->limit(10)->get();
        return view('front.home', compact('beritavs', 'beritas', 'videos', 'literasis','literasivs', 'albums','datenow', 'iklan1'));
    }

    public function index2()
    {
        $datenow = date('Y-m-d');
        $iklan1 = Iklan::where('spase',1)
        ->where('start_date', '<=', $datenow)
        ->where('end_date', '>=', $datenow)
        ->first();
        
        $videos = Video::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('created_at', 'DESC')->limit(4)->get();
        $beritas = Berita::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('created_at', 'DESC')->limit(10)->get();
        $beritavs = Berita::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('dilihat', 'DESC')->limit(10)->get();

        $literasis = Literasi::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('created_at', 'DESC')->limit(10)->get();
        $literasivs = Literasi::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('dilihat', 'DESC')->limit(10)->get();
        $fotos = Foto::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('created_at', 'DESC')->limit(15)->get();
        return view('front.index2', compact('beritavs', 'beritas', 'videos', 'literasis','literasivs', 'fotos','iklan1'));
    }
    
    public function beritasingle($slug)
    {
        $datenow = date('Y-m-d');
        $iklan1 = Iklan::where('spase',1)
        ->where('start_date', '<=', $datenow)
        ->where('end_date', '>=', $datenow)
        ->first();

        $berita = Berita::where(['slug'=>$slug,'publish'=>'Public'])->first();
        $berita['dilihat'] = $berita->dilihat+1;
        $berita->save();
        $beritavs = Berita::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('dilihat', 'DESC')->limit(10)->get();
        $videos = Video::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('created_at', 'DESC')->limit(8)->get();
        return view('front.berita-single', compact('berita', 'beritavs', 'videos','iklan1'));
    }

    public function literasisingle($slug)
    {
        $datenow = date('Y-m-d');
        $iklan1 = Iklan::where('spase',1)
        ->where('start_date', '<=', $datenow)
        ->where('end_date', '>=', $datenow)
        ->first();

        $literasi = Literasi::where(['slug'=>$slug,'publish'=>'Public'])->first();
        $literasi['dilihat'] = $literasi->dilihat+1;
        $literasi->save();
        $literasivs = Literasi::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('dilihat', 'DESC')->limit(10)->get();
        $videos = Video::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('created_at', 'DESC')->limit(8)->get();
        return view('front.literasi-single', compact('literasi', 'literasivs', 'videos','iklan1'));
    }

    public function videosingle($slug)
    {
        $datenow = date('Y-m-d');
        $iklan1 = Iklan::where('spase',1)
        ->where('start_date', '<=', $datenow)
        ->where('end_date', '>=', $datenow)
        ->first();
        $video = Video::where(['slug'=>$slug,'publish'=>'Public'])->first();
        $video['dilihat'] = $video->dilihat+1 ?? 1;
        $video->save();
        $videovs = Video::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('dilihat', 'DESC')->limit(10)->get();
        $videos = Video::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('created_at', 'DESC')->paginate(12);
        return view('front.video-single', compact('video', 'videovs', 'videos','iklan1'));
    }

    public function videolist()
    {
        $datenow = date('Y-m-d');
        $iklan1 = Iklan::where('spase',1)
        ->where('start_date', '<=', $datenow)
        ->where('end_date', '>=', $datenow)
        ->first();
        $videos = Video::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('created_at', 'DESC')->paginate(10);
        $videovs = Video::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('dilihat', 'DESC')->limit(10)->get();
        return view('front.video-list', compact('videovs', 'videos','iklan1'));
    }

    public function beritalist()
    {
        $datenow = date('Y-m-d');
        $iklan1 = Iklan::where('spase',1)
        ->where('start_date', '<=', $datenow)
        ->where('end_date', '>=', $datenow)
        ->first();
        $menu = 'berita';
        $title = 'Stories';
        $contents = Berita::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('created_at', 'DESC')->paginate(10);
        $populers = Berita::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('dilihat', 'DESC')->limit(10)->get();
        return view('front.contents', compact('menu', 'title','contents', 'populers','iklan1'));
    }

    public function literasilist()
    {
        $datenow = date('Y-m-d');
        $iklan1 = Iklan::where('spase',1)
        ->where('start_date', '<=', $datenow)
        ->where('end_date', '>=', $datenow)
        ->first();
        $menu = 'literasi';
        $title = 'Literasi';
        $contents = Literasi::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('created_at', 'DESC')->paginate(10);
        $populers = Literasi::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('dilihat', 'DESC')->limit(10)->get();
        return view('front.contents', compact('menu', 'title','contents', 'populers','iklan1'));
    }
    public function album($slug)
    {
        $datenow = date('Y-m-d');
        $iklan1 = Iklan::where('spase',1)
        ->where('start_date', '<=', $datenow)
        ->where('end_date', '>=', $datenow)
        ->first();
        $album = Album::where(['slug'=>$slug,'publish'=>'Public'])->first();
        $videos = Video::where('publish', 'Public')->where('status', 'Verifikasi')->orderBy('created_at', 'DESC')->limit(8)->get();
        return view('front.album', compact('album', 'videos','iklan1'));
    }

    public function fotolist()
    {
        $datenow = date('Y-m-d');
        $iklan1 = Iklan::where('spase',1)
        ->where('start_date', '<=', $datenow)
        ->where('end_date', '>=', $datenow)
        ->first();
        $albums = Album::where(['publish'=> 'Public','status'=>'Verifikasi'])->orderBy('id', 'DESC')->paginate(10);
        $fotos = Foto::orderBy('created_at', 'DESC')->limit(15)->get();
        return view('front.galeri-list', compact('albums','fotos','iklan1'));
    }
    public function atribut($atribut)
    {
        $datenow = date('Y-m-d');
        $iklan1 = Iklan::where('spase',1)
        ->where('start_date', '<=', $datenow)
        ->where('end_date', '>=', $datenow)
        ->first();
        $atribut = Atribut::where('atribut', $atribut)->first();
        return view('front.atribut', compact('atribut','iklan1'));
    }
    public function cari()
    {
        $videos = Video::where(['publish'=> 'Public','status'=>'Verifikasi'])->where('judul', 'like', '%'.$_GET['word'].'%')->get();
        $beritas = Berita::where(['publish'=> 'Public','status'=>'Verifikasi'])->where('judul', 'like', '%'.$_GET['word'].'%')->get();
        $literasis = Literasi::where(['publish'=> 'Public','status'=>'Verifikasi'])->where('judul', 'like', '%'.$_GET['word'].'%')->get();

        return view('front.find', compact('videos', 'beritas', 'literasis'));
    }
    public function tentangkami()
    {
        return view('front.tentangkami');
    }
    public function pedomansiber()
    {
        return view('front.pedomansiber');
    }
    
}
