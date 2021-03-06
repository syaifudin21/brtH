@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Tambah Berita</p>
        </div>
    </div>

    <div class="row">
            <div class="col-md-12">
                <div class="tile">
                  <div class="tile-body">
                    <form class="form-horizontal" id="submit-form" enctype="multipart/form-data" method="post" action="{{route('admin.foto.store')}}">
                    {{ csrf_field() }} <input type="hidden" name="album_id" value="{{$album_id}}">
    
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Foto</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi foto" rows="8">{{old('deskripsi')}}</textarea>
                                        @if ($errors->has('deskripsi'))
                                            <small class="form-text text-muted">{{ $errors->first('deskripsi') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" onchange="fotoURl(this)" name="foto" id="staticEmail" >
                                        @if ($errors->has('foto'))
                                            <small class="form-text text-muted">{{ $errors->first('foto') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <img src="{{asset('images/thumbnail.svg')}}" style="max-height: 130px" class="rounded" alt="thumbnail" id="gambar">
                            </div>
                        </div>
    
                    </form>
    
                  </div>
                  <div class="tile-footer">
                    <div class="row">
                      <div class="col-md-8 col-md-offset-3">
                        <button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('submit-form').submit();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>
                        <a class="btn btn-secondary" href="{{url()->previous()}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                        {{-- <small class="form-text text-muted" id="jadwalhelp">Foto galeri diinputkan setelah nama gunung dan deskripsi gunung sudah ditambah</small> --}}
                    </div>
                    </div>
                  </div>
                </div>
              </div>
    
    </div>
</main>

@endsection

@section('script')
<script>
function fotoURl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#gambar').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

</script>
@endsection
