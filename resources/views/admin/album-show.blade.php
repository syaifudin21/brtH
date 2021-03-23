@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">

    <h4>{{$album->album}} <br><small>{{$album->reporter_id != 0 ? ($album->reporter) ? $album->reporter->nama: 'Admin2' : 'Admin'}}</small></h4>
    <a href="{{route('admin.foto.create', ['album_id'=>$album->id])}}" class="btn btn-sm btn-primary">Tambah Foto</a>

            <div class="toggle-flip">
            <label>
                <input type="checkbox"  onchange="status('{{$album->id}}')" {{($album->status == 'Verifikasi')? 'checked' : '' }}  ><span id="ketstatus" class="flip-indecator" data-toggle-on="Verifikasi" data-toggle-off="{{$album->status == 'Verifikasi' ? 'Block': $album->status}}" style="width: 100px"></span>
            </label>
            <label>
                <input type="checkbox"  onchange="publish('{{$album->id}}')" {{($album->publish == 'Public')? 'checked' : '' }}  ><span class="flip-indecator" data-toggle-on="Public" data-toggle-off="Private"></span>
            </label>
            </div>
           
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-9">
                <div class="card float-left"  style="width: 100%">
                        <div class="card-body">
                          <p class="card-text">{{$album->deskripsi}}</p>
                          <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('admin.album.edit',['id'=>$album->id])}}" class="btn btn-info btn-sm">Edit Deskripsi Album</a>
                                <button onClick="hapus('{{route('admin.album.delete', ['id'=> $album->id])}}', 'Foto yakin ingin dihapus')" class="btn btn-danger btn-sm float-right">Hapus Album</button>
                        </div>
                    </div>
            @foreach ($album->foto()->get() as $foto)
                <div class="card float-left"  style="width: 100%">
                    <figure class="figure">
                        <img src="{{asset($foto->foto)}}" class="figure-img img-fluid rounded" style="width: 100%">
                        <figcaption class="figure-caption text-left"><i class="fa fa-camera" aria-hidden="true" style="padding: 2px 12px"></i> {{$foto->reporter_id != 0 ? ($foto->reporter) ? $foto->reporter->nama: 'Admin2' : 'Admin'}} - {{hari_tanggal_waktu($foto->updated_at, true)}}</figcaption>
                    </figure>
                    <div class="card-body">
                      <p class="card-text">{{$foto->deskripsi}}</p>
                      <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('admin.foto.edit',['id'=>$foto->id])}}" class="btn btn-info btn-sm">Edit Foto</a>
                            <button onClick="hapus('{{route('admin.foto.delete', ['id'=> $foto->id])}}', 'Foto yakin ingin dihapus')" class="btn btn-danger btn-sm float-right">Hapus Foto</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>

@endsection

@section('script')
<script src="{{asset('js/hapus.js')}}"></script>
<script src="{{asset('js/hapusfunc.js')}}"></script>
<script>
    function publish(no) {
        $.get('{{ route('admin.album.publish')}}?id='+no, function(response){
            // console.log(response.publish);
            $(this).value = response.publish;
        });
    }
    function status(no) {
        $.get('{{ route('admin.album.verifikasi')}}?id='+no, function(response){
            // console.log(response.status);
        });
    }
</script>
@endsection
