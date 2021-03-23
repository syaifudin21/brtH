@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Manajemen Video</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Daftar Video

                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('admin.video.create')}}">
                            <i class="fa fa-plus"></i>Tambah</a>
                    </div>
                </h3>
                <div class="bs-component">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Judul Video</th>
                                <th class="text-center">Publish</th>
                                <th class="text-center">Verifikasi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $video)
                            <tr>
                                <td>
                                    <div class="media">
                                        <img src="{{app('App\Models\Video')->gambarkecil($video->url)}}" class="leading mr-3" alt="..." style="width: 64px">
                                        <div class="media-body">
                                            <b>{{$video->judul}}</b><br>
                                            <small>@if ($video->reporter_id != 0 ) Reporter : <a href="{{url('/admin/reporter/show/'.$video->reporter_id)}}">{{$video->reporter->nama ?? 'Admin2'}}</a> - @endif {{hari_tanggal_waktu($video->created_at, true)}}</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{$video->status}}</td>
                                <td class="text-center">{{$video->publish}}</td>
                                <td class="text-center">
                                <a href="{{route('admin.video.show',['id'=>$video->id])}}" class="btn btn-sm btn-primary">Detail</a>
                                <a class="btn btn-light btn-sm" href="{{route('admin.video.edit', ['id'=> $video->id])}}">
                                        <i class="fa fa-edit"></i>Edit</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>
</main>


@endsection

@section('script')
<script src="{{asset('js/hapus.js')}}"></script>
@endsection
