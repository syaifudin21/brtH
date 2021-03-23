@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Manajemen Iklan</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Daftar Iklan

                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('admin.iklan.create')}}">
                            <i class="fa fa-plus"></i>Tambah</a>
                    </div>
                </h3>
                <div class="bs-component">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th style="width: 64px">Foto</th>
                                <th class="text-center">Spase</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Link</th>
                                <th class="text-center">Start Date</th>
                                <th class="text-center">End Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($iklans as $iklan)
                            <tr>

                                <td>
                                    <a href="{{asset($iklan->foto)}}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{asset($iklan->foto)}}" class="leading mr-3" style="width: 64px">
                                    </a>
                                </td>
                                <td class="text-center">{{$iklan->spase}}</td>
                                <td class="text-center">{{$iklan->publish}}</td>
                                <td class="text-center">{{$iklan->link}}</td>
                                <td class="text-center">{{hari_tanggal($iklan->start_date, true)}}</td>
                                <td class="text-center">{{hari_tanggal($iklan->end_date,true)}}</td>
                                <td class="text-center">
                                    <a class="btn btn-light btn-sm" href="{{route('admin.iklan.edit', ['id'=> $iklan->id])}}">
                                            <i class="fa fa-edit"></i>Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$iklans->links()}}

                </div>

            </div>

        </div>

    </div>
</main>


@endsection

@section('script')
<script src="{{asset('js/hapus.js')}}"></script>
@endsection
