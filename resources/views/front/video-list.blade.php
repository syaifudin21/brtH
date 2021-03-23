@extends('front.front-template')
@section('css')

@endsection
@section('content')

<div class="main-content-wrapper" style="padding: 100px 0px">
    <div class="container">

        <div class="world-latest-articles">
            <div class="row">
                <div class="col-12 col-lg-8">
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
                                            <h6 data-toggle="tooltip" data-placement="bottom" title="{{$video->judul}}">{{limit_word($video->judul, 37)}}</h6>
                                        </a>
                                        {{-- <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p> --}}
                                        <!-- Post Meta -->
                                        <div class="post-meta">
                                            <p><a href="#" class="post-author">{{$video->reporter_id != 0 ?  ($video->reporter) ? $video->reporter->nama : 'Admin2' : 'Admin'}}</a> - <a href="#" class="post-date">{{hari_tanggal_waktu($video->created_at)}}</a></p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                        </div>

                        <div class="row justify-content-md-center" style="padding: 20px">
                            {{$videos->links('pagination.default')}}
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

    </div>
</div>

@endsection

@section('script')

@endsection
