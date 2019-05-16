@extends('front.front-template')


@section('meta-judul', $album->album)
@section('meta-keywords', $album->album)
@section('meta-news_keywords', $album->album)
@section('meta-deskripsi', $album->album)
@section('meta-image', env('APP_URL').$album->foto()->first()->foto)

@section('css')
<link rel="stylesheet" href="{{asset('vendor/photoswipe/photoswipe.css')}}">
<link rel="stylesheet" href="{{asset('vendor/photoswipe/default-skin/default-skin.css')}}">

@endsection
@section('content')

    <div class="main-content-wrapper section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- ============= Post Content Area ============= -->
                <div class="col-12 col-lg-8">
                    <div class="single-blog-content mb-100">
                        <!-- Post Meta -->
                        <div class="post-meta">
                            <p><a href="#" class="post-date">{{hari_tanggal_waktu($album->created_at, true)}}</a> <a href="#" class="post-author">{{$album->reporter_id != 0 ?  ($album->reporter) ? $album->reporter->nama: 'NN' : 'Admin'}}</a> - Papua 60 Detik</p>
                        </div>

                        <!-- Post Content -->
                        <div>
                            <h4>{{$album->album}}</h4>
                            <p>{{$album->deskripsi}}</p>
                           
                            <div class="widget-content float-right" style="padding: 5px;">
                                    <span class="mr-2">Bagikan :</span>
                                    <a href="https://www.facebook.com/sharer.php?u={{url()->current()}}" style="margin: 0px 5px; color: blue" target="_blank"><img src="{{asset('images/icon/fb.png')}}" alt="" width="25px"></a>
                                    <a href="https://twitter.com/intent/tweet?url={{url()->current()}}" style="margin: 0px 5px; color: lightblue" target="_blank"><img src="{{asset('images/icon/twitter.png')}}" alt="" width="22px"></a>
                                    <a href="   https://wa.me/?text={{url()->current()}}" style="margin: 0px 5px; color: green" target="_blank" data-action="share/whatsapp/share"><img src="{{asset('images/icon/wa.png')}}" alt="" width="25px"></a>
                            </div>
                            <br>

                            <div class="my-gallery" itemscope itemtype="{{url()->current()}}">
                                @foreach ($album->foto()->get() as $foto)
                              <figure itemprop="associatedMedia" itemscope itemtype="{{url()->current()}}">
                                <a href="{{asset($foto->foto)}}" itemprop="contentUrl" data-size="964x1024">
                                    <img src="{{asset($foto->foto)}}" itemprop="thumbnail" alt="{{$foto->deskripsi}}" />
                                </a>
                                <figcaption class="figure-caption text-left"><i class="fa fa-camera" aria-hidden="true" style="padding: 2px 12px"></i> {{$foto->reporter_id != 0 ? ($foto->reporter) ? $foto->reporter->nama: 'NN' : 'Admin'}} - {{hari_tanggal_waktu($foto->updated_at, true)}}</figcaption>

                                <p style="padding: 20px 0px">{{$foto->deskripsi}}</p>

                              </figure>
                              
                              @endforeach
                            </div>

                    </div>
                </div>
                </div>

                <!-- ========== Sidebar Area ========== -->
                <div class="col-12 col-md-8 col-lg-4">
                        <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
                            <!-- Widget Area -->
                            
    
                            <div class="sidebar-widget-area">
                                <h5 class="title">Video Terpopuler</h5>
                                <div class="widget-content">
                                    @foreach ($videos as $video)
                                    <a href="{{route('video.single', ['slug'=>$video->slug])}}" class="list-group-item list-group-item-action">
                                        <div class="media">
                                        <img src="{{asset($video->gambarmedium($video->url))}}" class="mr-3" alt="{{$video->slug}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 90px; height: 60px">
                                        <div class="media-body">
                                            <b class="mt-0">{{limit_word($video->judul,30)}}</b>
                                            <br>
                                            {{-- {{$literasi->berita}} --}}
                                            {{$video->reporter_id != 0 ?  ($video->reporter) ? $video->reporter->nama : 'NN' : 'Admin'}} - {{hari_tanggal_waktu($video->created_at)}}
                                            
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

@endsection


@section('script')
@include('pagination.swipe')
    <script src="{{asset('vendor/photoswipe/photoswipe.min.js')}}"></script> 
    <script src="{{asset('vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script> 
    <script src="{{asset('vendor/photoswipe/swipe.js')}}"></script>
@endsection