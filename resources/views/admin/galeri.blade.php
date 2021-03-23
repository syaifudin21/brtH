@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Manajemen Album Galeri</p>
        </div>
        <div class="btn-group float-right" role="group" aria-label="Basic example">
                <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('admin.album.create')}}">
                    <i class="fa fa-plus"></i>Tambah</a>
            </div>
    </div>

    

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Daftar Album</h3>
                
                <div class="bs-component">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Album</th>
                                <th class="text-center">Jumlah Foto</th>
                                <th>Reporter</th>
                                <th  class="text-center">Keterangan</th>
                                <th  class="text-center">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($albums as $album)
                            <tr>
                                <td>{{$album->album}}</td>
                                <td class="text-center">{{$album->foto()->count()}}</td>
                                <td>{{$album->reporter_id != 0 ? ($album->reporter) ? $album->reporter->nama: 'Admin2' : 'Admin'}}</td>
                                <td class="text-center">
                                        <div class="toggle-flip">
                                            <label>
                                                <input type="checkbox"  onchange="status('{{$album->id}}')" {{($album->status == 'Verifikasi')? 'checked' : '' }}  ><span id="ketstatus" class="flip-indecator" data-toggle-on="Verifikasi" data-toggle-off="{{$album->status == 'Verifikasi' ? 'Block': $album->status}}" style="width: 100px"></span>
                                            </label>
                                            <label>
                                                <input type="checkbox"  onchange="publish('{{$album->id}}')" {{($album->publish == 'Public')? 'checked' : '' }}  ><span class="flip-indecator" data-toggle-on="Public" data-toggle-off="Hidden"></span>
                                            </label>
                                            </div>    
                                </td>
                                <td class="text-center">
                                        <a class="btn btn-info btn-sm" href="{{route('admin.album.edit', ['id'=> $album->id])}}">
                                                <i class="fa fa-edit"></i>Edit</a>

                                        <button onClick="hapus('{{route('admin.album.delete', ['id'=> $album->id])}}', 'Foto yakin ingin dihapus')" class="btn btn-danger btn-sm">Hapus</button>
                                        <a href="{{route('admin.album.show',['album_id'=>$album->id])}}" class="btn btn-sm btn-primary">Album</a>
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
<script src="{{asset('js/hapusfunc.js')}}"></script>
<script>
function publish(no) {
    $.get('{{ route('admin.album.publish')}}?id='+no, function(response){
        console.log(response);
    });
}
function status(no) {
    $.get('{{ route('admin.album.verifikasi')}}?id='+no, function(response){
        // console.log(response.status);
    });
}
</script>
@endsection
