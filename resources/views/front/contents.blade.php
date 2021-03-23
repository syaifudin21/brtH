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
                        <h5>{{$title}} Terbaru</h5>
                    </div>

                    <!-- Single Blog Post -->

                    @foreach ($contents as $content)
                    <a href="{{route($menu.'.single', ['slug'=>$content->slug])}}" class="list-group-item list-group-item-action">
                        <div class="media">
                        <img src="{{asset($content->gambar)}}" class="mr-3" alt="{{$content->slug}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 140px; height: 100px">
                        <div class="media-body">
                            <h6 class="mt-0" style="font-weight: 600">{{$content->judul}}</h6>
                            {{-- {{$content->berita}} --}}
                            {{$content->reporter_id != 0 ?  ($content->reporter) ? $content->reporter->nama : 'Admin2' : 'Admin'}} - {{hari_tanggal_waktu($content->created_at)}}
                            
                        </div>
                        </div>
                    </a>
                    @endforeach


                    <div class="row justify-content-md-center" style="padding: 20px">
                        {{$contents->links('pagination.default')}}
                    </div>

                </div>

                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Widget Area -->

                        <div class="sidebar-widget-area">
                            <h5 class="title">{{$title}} Terpopuler</h5>
                            <div class="list-group">
                                @foreach ($populers as $populer)
                                <a href="{{route('literasi.single', ['slug'=>$populer->slug])}}" class="list-group-item list-group-item-action">
                                        <div class="media">
                                        <img src="{{asset($populer->gambar)}}" class="mr-3" alt="{{$populer->slug}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 90px; height: 60px">
                                        <div class="media-body">
                                            <h6 class="mt-0" style="font-weight: 600">{{$populer->judul}}</h6>
                                            {{-- {{$literasi->berita}} --}}
                                            {{$populer->reporter_id != 0 ?  ($populer->reporter) ? $populer->reporter->nama : 'Admin2' : 'Admin'}} - {{hari_tanggal_waktu($populer->created_at)}}
                                            
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
