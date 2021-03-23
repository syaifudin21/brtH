@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Manajemen Literasi</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Daftar Literasi

                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('admin.literasi.create')}}">
                            <i class="fa fa-plus"></i>Tambah</a>
                    </div>
                </h3>
                <div class="bs-component">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>literasi</th>
                                <th>Reporter</th>
                                <th class="text-center">Dilihat</th>
                                <th class="text-center">Verifikasi</th>
                                <th class="text-center">Publish</th>
                                <th class="text-center">literasi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($literasis as $literasi)
                            <tr>
                                <td>
                                    <div class="media">
                                    <img src="{{asset($literasi->gambar)}}" class="leading mr-3" alt="..." style="width: 64px">
                                    <div class="media-body">
                                        <b>{{$literasi->judul}}</b><br>
                                        <small style="font-size: 80%">{{hari_tanggal_waktu($literasi->created_at, true)}}</small> <br>
                                        Kategori : {{$literasi->kategori}}
                                    </div>
                                    </div>
                                </td>
                                <td>{{$literasi->reporter_id != 0 ?  ($literasi->reporter) ?  $literasi->reporter->nama : 'Admin2' : 'Admin'}}</td>
                                <td class="text-center">{{$literasi->dilihat}}</td>
                                <td class="text-center">{{$literasi->status}}</td>
                                <td class="text-center">{{$literasi->publish}}</td>
                                <td class="text-center">
                                <a href="{{route('admin.literasi.show',['id'=>$literasi->id])}}" class="btn btn-sm btn-default">Detail</a>
                                <a class="btn btn-light btn-sm" href="{{route('admin.literasi.edit', ['id'=> $literasi->id])}}">
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
