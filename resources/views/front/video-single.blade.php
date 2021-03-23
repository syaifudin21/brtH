@extends('front.front-template')

@section('meta-judul', $video->judul)
@section('meta-keywords', $video->kategori)
@section('meta-news_keywords', $video->kategori)
@section('meta-deskripsi', $video->judul)
@section('meta-image', $video->gambarmedium($video->url))

@section('css')
<style>
    .thumbnail {
        width: 300px;
        height: 160px;
    }
    .thumbnail iframe {
        width: 900px;
        height: 480px;
        -webkit-transform-origin: 0 0;
        -moz-transform-origin: 0 0;
        transform-origin: 0 0;
        -webkit-transform:  scale(0.3, 0.3);
        -moz-transform:  scale(0.3, 0.3);
        transform:  scale(0.3, 0.3);
        overflow: hidden;
    }
    .thumbnail.overlay {
        position: relative;
    }
    .thumbnail.overlay iframe {
        position: relative;
        z-index: 1;
    }
    .thumbnail.overlay a {
        display: block;
        position: absolute;
        z-index: 2;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        color: #fff;
        background-color: #fff;
        opacity: 0;
    }
    </style>
@endsection
@section('content')

    
    <!-- ********** Hero Area Start ********** -->
    {{-- <div class="hero-area bg-img background-overlay">
            <div class="row align-items-center justify-content-center">
                <div class="col-12">
                    <div class="single-blog-title text-center">
                            <div class="embed-responsive embed-responsive-21by9"  style="min-height: 400px"><iframe class="embed-responsive-item" src="{{app('App\Models\Video')->embed($video->url)}}" allowfullscreen></iframe></div>
                    </div> 
                </div>
            </div>
    </div> --}}
    <!-- ********** Hero Area End ********** -->
    
    <div class="main-content-wrapper">
            <div class="container">
                <br><br><br><br>
                    <div class="single-blog-title text-center">
                            <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="{{app('App\Models\Video')->embed($video->url)}}" allowfullscreen></iframe></div>
                    </div>
        
                <div class="world-latest-articles">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="title" style="margin-top: 0px">
                            <h5 style="font-size: 20px">{{$video->judul}}</h5>

                            
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-7">
                                    <div class="post-date"><span class="doted">Dipublikasikan pada {{hari_tanggal_waktu($video->created_at)}}</span></div>
                                </div> 
                                <div class="col-md-5 m-hide">
                                    <div class="widget-content" style="padding: 5px;">
                                            <span class="mr-2">Bagikan :</span>
                                            <a href="https://www.facebook.com/sharer.php?u={{url()->current()}}" style="margin: 0px 5px; color: blue" target="_blank"><img src="{{asset('images/icon/fb.png')}}" alt="" width="25px"></a>
                                            <a href="https://twitter.com/intent/tweet?url={{url()->current()}}" style="margin: 0px 5px; color: lightblue" target="_blank"><img src="{{asset('images/icon/twitter.png')}}" alt="" width="22px"></a>
                                            <a href="   https://wa.me/?text={{url()->current()}}" style="margin: 0px 5px; color: green" target="_blank" data-action="share/whatsapp/share"><img src="{{asset('images/icon/wa.png')}}" alt="" width="25px"></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <hr>


                            {!!$video->deskripsi!!}
                            <hr>

                            <div class="title">
                                <h5>Video Terbaru</h5>
                            </div>
        
                            <div class="row">
                                @foreach ($videos as $i => $video)
                                <div class="col-12 col-md-4">
                                        <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">
                                                <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <a href="{{route('video.single', ['slug'=>$video->slug])}}">
                                                    <img src="{{app('App\Models\Video')->gambarmedium($video->url)}}" alt="">
                                                <!-- Catagory -->
                                                {{-- <div class="post-cta"><a href="#">travel</a></div> --}}
                                                <!-- Video Button -->
                                                {{-- <a href="{{app('App\Models\Video')->watch($video->url)}}" class="video-btn"><i class="fa fa-play"></i></a> --}}
                                                </a>
                                            </div>
                                            <!-- Post Content -->
                                            <div class="post-content" style="padding: 10px 15px">
                                                <a href="{{route('video.single', ['slug'=>$video->slug])}}" class="headline">
                                                    <h6 data-toggle="tooltip" data-placement="bottom" title="{{$video->judul}}">{{limit_word($video->judul, 40)}}</h6>
                                                </a>
                                                {{-- <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p> --}}
                                                <!-- Post Meta -->
                                                <div class="post-meta">
                                                    <p style="color: #a29b9b">{{$video->reporter_id != 0 ?  ($video->reporter) ? $video->reporter->nama : 'Admin2' : 'Admin'}} - {{hari_tanggal_waktu($video->created_at)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                @endforeach
                                </div>
                        </div>
        
                        <div class="col-12 col-md-8 col-lg-4">
                            <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
                                <!-- Widget Area -->
                                
        
                                <div class="sidebar-widget-area">
                                    <h5 class="title">Video Terpopuler</h5>
                                    <div class="widget-content">
                                        @foreach ($videovs as $videov)
                                        <a href="{{route('video.single', ['slug'=>$videov->slug])}}" class="list-group-item list-group-item-action">
                                            <div class="media">
                                            <img src="{{asset($videov->gambarmedium($videov->url))}}" class="mr-3" alt="{{$videov->slug}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 90px; height: 60px">
                                            <div class="media-body">
                                                <b class="mt-0">{{limit_word($videov->judul,30)}}</b>
                                                <br>
                                                {{-- {{$literasi->berita}} --}}
                                                {{$videov->reporter_id != 0 ?  ($videov->reporter) ? $videov->reporter->nama : 'Admin2' : 'Admin'}} - {{hari_tanggal_waktu($videov->created_at)}}
                                                
                                            </div>
                                            </div>
                                        </a>
                                        @endforeach
        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Load More btn -->
                <div class="row">
                    <div class="col-12">
                        <div class="load-more-btn mt-50 text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection


@section('script')
@endsection