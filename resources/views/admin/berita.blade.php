@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Manajemen Berita</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Daftar Berita

                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('admin.berita.create')}}">
                            <i class="fa fa-plus"></i>Tambah</a>
                    </div>
                </h3>
                <div class="bs-component">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Berita</th>
                                <th>Reporter</th>
                                <th class="text-center">Dilihat</th>
                                <th class="text-center">Publish</th>
                                <th class="text-center">Verifikasi</th>
                                <th class="text-center">Berita</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beritas as $berita)
                            <tr>
                                <td>
                                    <div class="media">
                                    <img src="{{asset($berita->gambar)}}" class="leading mr-3" alt="..." style="width: 64px">
                                    <div class="media-body">
                                        <b>{{$berita->judul}}</b><br>
                                        <small style="font-size: 80%"> @if ($berita->reporter_id != 0 ) Reporter : <a href="{{url('/admin/reporter/show/'.$berita->reporter_id)}}">{{$berita->reporter_id != 0 ?  ($berita->reporter) ? $berita->reporter->nama : 'Admin2' : 'Admin'}}</a> - @endif {{hari_tanggal_waktu($berita->created_at, true)}}</small> <br>
                                        Kategori : {{$berita->kategori}}
                                    </div>
                                    </div>
                                </td>
                                <td>{{$berita->reporter_id != 0 ?  ($berita->reporter) ?  $berita->reporter->nama : 'Admin2' : 'Admin'}}</td>
                                <td class="text-center">{{$berita->dilihat}}</td>
                                <td class="text-center">{{$berita->publish}}</td>
                                <td class="text-center">{{$berita->status}}</td>
                                <td class="text-center">
                                <a href="{{route('admin.berita.show',['id'=>$berita->id])}}" class="btn btn-sm btn-default">Detail</a>
                                <a class="btn btn-light btn-sm" href="{{route('admin.berita.edit', ['id'=> $berita->id])}}">
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
