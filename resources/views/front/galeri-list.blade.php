@extends('front.front-template')
@section('css')

{{-- <link rel="stylesheet" href="{{asset('vendor/galeri/css/lc_lightbox.css')}}">
<link rel="stylesheet" href="{{asset('vendor/galeri/css/lc_lightbox.min.css')}}"> --}}

@endsection
@section('content')

<div class="main-content-wrapper" style="padding: 100px 0px">
    <div class="container">

        <div class="world-latest-articles">
            <div class="row">
                <div class="col-12 ">
                    <div class="title">
                        <h5>Geleri</h5>
                    </div>

                    {{-- <div class="row text-center ">
                        <div id="aniimated-thumbnials">
                            @forelse ($fotos as $foto)
                            <a href="{{$foto->foto}}" class="mybox md-5" title="{{$foto->judul}}" data-lcl-txt="{{$foto->deskripsi}}" data-lcl-author="{{$foto->reporter_id != 0 ?  ($foto->reporter) ? $foto->reporter->nama : 'Admin2' : 'Admin'}}">
                                    <img src="{{$foto->foto}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 200px; height: 200px">
                                </a>
                            @empty
                            Belum ada content Foto
                            @endforelse
                        </div> 
                    </div>--}}

                    <div class="row">
                    @foreach ($albums as $album)
                        @if ($album->foto()->first())
                        <div class="col-xs-12 col-xl-4 col-sm-6">
                                <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">
                                    <div class="post-thumbnail">
                                        <a href="{{route('album.single', ['slug'=>$album->slug])}}">
                                            <img src="{{asset($album->foto()->first()->foto)}}" alt="" style="object-fit: cover; width: 100%; height: 240px">
                                        </a>
                                        <div class="image-icon">
                                            <i class="fa fa-picture-o" aria-hidden="true"></i> {{$album->foto()->count()}}
                                        </div>
                                    </div>
                                    <div class="post-content" style="padding: 10px 15px">
                                        <a href="{{route('album.single', ['slug'=>$album->slug])}}" class="headline">
                                            <h5 data-toggle="tooltip" data-placement="bottom" title="{{$album->album}}">{{limit_word($album->album, 35)}}</h5>
                                        </a>
                                        <div class="post-meta">
                                            <p><a href="#" class="post-author">{{$album->reporter_id != 0 ?  ($album->reporter) ? $album->reporter->nama : 'Admin2' : 'Admin'}}</a> - <a href="#" class="post-date">{{hari_tanggal_waktu($album->created_at)}}</a></p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endif
                        @endforeach
                    </div>

                    <div class="row justify-content-md-center" style="padding: 20px">
                        {{$albums->links('pagination.default')}}
                    </div>
                                
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

@section('script')
{{-- <script src="{{asset('vendor/galeri/lib/AlloyFinger/alloy_finger.min.js')}}"></script>
<script src="{{asset('vendor/galeri/js/lc_lightbox.lite.min.js')}}"></script> --}}
<script>
        lc_lightbox('.mybox',{
            wrap_class: 'lcl_fade_oc',
            gallery: true,
            skin: 'minimal',
        })
</script>
@endsection
