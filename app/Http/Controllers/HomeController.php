<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Video;
use App\Models\Literasi;
use App\Models\Foto;
use App\Models\Atribut;
use App\Models\Album;
use App\Models\Iklan;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;

// OR
use Artesaos\SEOTools\Facades\SEOTools;


class HomeController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('Papua60detik');
        SEOTools::setDescription('Berita Seputar Papua');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage(asset(env('APP_ICON', 'images/icon.png')));

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
        SEOTools::setTitle('Papua60detik');
        SEOTools::setDescription('Berita Seputar Papua');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage(asset(env('APP_ICON', 'images/icon.png')));

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

        SEOMeta::setTitle($berita->judul);
        SEOMeta::setDescription($berita->caption);
        SEOMeta::addMeta('article:published_time', $berita->update_at, 'property');
        SEOMeta::addMeta('article:section', $berita->kategori, 'property');

        OpenGraph::setDescription($berita->caption);
        OpenGraph::setTitle($berita->judul);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id-ID');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        OpenGraph::addImage(asset($berita->gambar));
        OpenGraph::addImage(asset($berita->gambar));
        OpenGraph::addImage(['url' => asset(env('APP_ICON', 'images/icon.png')), 'size' => 300]);
        OpenGraph::addImage(asset($berita->gambar), ['height' => 300, 'width' => 300]);
        
        JsonLd::setTitle($berita->judul);
        JsonLd::setDescription($berita->caption);
        JsonLd::setType('Article');
        JsonLd::addImage(asset($berita->gambar));

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
        
        SEOMeta::setTitle($literasi->judul);
        SEOMeta::setDescription($literasi->caption);
        SEOMeta::addMeta('article:published_time', $literasi->update_at, 'property');
        SEOMeta::addMeta('article:section', $literasi->kategori, 'property');

        OpenGraph::setDescription($literasi->caption);
        OpenGraph::setTitle($literasi->judul);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id-ID');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        OpenGraph::addImage(asset($literasi->gambar));
        OpenGraph::addImage(asset($literasi->gambar));
        OpenGraph::addImage(['url' => asset(env('APP_ICON', 'images/icon.png')), 'size' => 300]);
        OpenGraph::addImage(asset($literasi->gambar), ['height' => 300, 'width' => 300]);
        
        JsonLd::setTitle($literasi->judul);
        JsonLd::setDescription($literasi->caption);
        JsonLd::setType('Article');
        JsonLd::addImage(asset($literasi->gambar));

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
        $video['dilihat'] = $video->dilihat+1;
        $video->save();

        SEOMeta::setTitle($video->judul);
        SEOMeta::setDescription($video->slug);
        SEOMeta::addMeta('article:published_time', $video->update_at, 'property');
        SEOMeta::addMeta('article:section', $video->kategori, 'property');

        OpenGraph::setDescription($video->slug);
        OpenGraph::setTitle($video->judul);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id-ID');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        OpenGraph::addImage(asset($video->thumbnail));
        OpenGraph::addImage(asset($video->thumbnail));
        OpenGraph::addImage(['url' => asset(env('APP_ICON', 'images/icon.png')), 'size' => 300]);
        OpenGraph::addImage(asset($video->thumbnail), ['height' => 300, 'width' => 300]);
        
        JsonLd::setTitle($video->judul);
        JsonLd::setDescription($video->slug);
        JsonLd::setType('Article');
        JsonLd::addImage(asset($video->thumbnail));

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
}
