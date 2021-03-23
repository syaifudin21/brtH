@extends('front.front-template')

@section('css')

@endsection
@section('content')

    <div class="main-content-wrapper section-padding-100">
        <div class="container" style="min-height: 400px">
            <div class="row ">
                <!-- ========== Sidebar Area ========== -->
                @if (count($beritas))
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area mb-100">
                        
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Stories</h5>
                            <div class="widget-content">
                                
                                        @foreach ($beritas as $berita)
                                        <a href="{{route('berita.single', ['slug'=>$berita->slug])}}" class="list-group-item list-group-item-action">
                                            <div class="media">
                                            <img src="{{asset($berita->gambar)}}" class="mr-3" alt="{{$berita->slug}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 90px; height: 60px">
                                            <div class="media-body">
                                                <b class="mt-0">{{limit_word($berita->judul,30)}}</b>
                                                <br>
                                                {{-- {{$literasi->berita}} --}}
                                                {{$berita->reporter_id != 0 ?  ($berita->reporter) ? $berita->reporter->nama : 'Admin2' : 'Admin'}} - {{hari_tanggal_waktu($berita->created_at)}}
                                                
                                            </div>
                                            </div>
                                        </a>
                                        @endforeach
        
                            </div>
                        </div>
                        <!-- Widget Area -->
                        
                    </div>
                </div>
                @endif

                @if (count($literasis))
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area mb-100">
                        
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Literasi</h5>
                            <div class="widget-content">
                                
                                        @foreach ($literasis as $literasi)
                                        <a href="{{route('literasi.single', ['slug'=>$literasi->slug])}}" class="list-group-item list-group-item-action">
                                            <div class="media">
                                            <img src="{{asset($literasi->gambar)}}" class="mr-3" alt="{{$literasi->slug}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 90px; height: 60px">
                                            <div class="media-body">
                                                <b class="mt-0">{{limit_word($literasi->judul,30)}}</b>
                                                <br>
                                                {{-- {{$literasi->berita}} --}}
                                                {{$literasi->reporter_id != 0 ?  ($literasi->reporter) ? $literasi->reporter->nama : 'Admin2' : 'Admin'}} - {{hari_tanggal_waktu($literasi->created_at)}}
                                                
                                            </div>
                                            </div>
                                        </a>
                                        @endforeach
        
                            </div>
                        </div>
                        <!-- Widget Area -->
                        
                    </div>
                </div>
                @endif


                @if (count($videos))
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area mb-100">
                        
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Video</h5>
                            <div class="widget-content">
                                
                                        @foreach ($videos as $video)
                                        <a href="{{route('video.single', ['slug'=>$video->slug])}}" class="list-group-item list-group-item-action">
                                            <div class="media">
                                            <img src="{{$video->gambarmedium($video->url)}}" class="mr-3" alt="{{$video->slug}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 90px; height: 60px">
                                            <div class="media-body">
                                                <b class="mt-0">{{limit_word($video->judul,50)}}</b>
                                                <br>
                                                {{-- {{$literasi->berita}} --}}
                                                {{$video->reporter_id != 0 ?  ($video->reporter) ? $video->reporter->nama : 'Admin2' : 'Admin'}} - {{hari_tanggal_waktu($video->created_at)}}
                                                
                                            </div>
                                            </div>
                                        </a>
                                        @endforeach
        
                            </div>
                        </div>
                        <!-- Widget Area -->
                        
                    </div>
                </div>
                
                @endif

                @if(!count($beritas) && !count($literasis) && !count($videos) )
                Konten yang anda cari tidak diketemukan
                @endif
                
            </div>

        </div>
    </div>

@endsection


@section('script')
@endsection