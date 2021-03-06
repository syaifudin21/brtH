@extends('reporter.reporter-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">

    <h4>{{$video->judul}}</h4>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-9 col-sm-12">
			<div class="tile">
                    <div class="text-center">
                        <h3>{{$video->judul}}</h3>
                    </div>
                    <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="{{app('App\Models\Video')->embed($video->url)}}" allowfullscreen></iframe></div>
                    <hr>
                    {!!$video->deskripsi!!}
            <div class="tile-footer">
                Terakhir diupdate {{hari_tanggal_waktu($video->updated_at, true)}}

                <div class="btn-group float-right" role="group" aria-label="Basic example">

                    <a class="btn btn-outline-secondary mr-1 mb-1 btn-sm" href="{{route('admin.video.edit', ['id'=> $video->id])}}">
                    <i class="fa fa-edit"></i>Edit</a>
                    <button class="btn btn-outline-danger mr-1 mb-1 btn-sm" data-pesan="Apakah kamu yakin ingin menghapu deskripsi video {{$video->judul}}" data-url="{{route('admin.video.delete', ['id'=> $video->id])}}" data-redirect="{{route('admin.video')}}" id="hapus">
                    <i class="fa fa-fire"></i>Hapus</button>
                </div>
            </div>
            </div>
        </div>

    </div>
</main>

@endsection

@section('script')
<script src="{{asset('js/hapus.js')}}"></script>
@endsection
