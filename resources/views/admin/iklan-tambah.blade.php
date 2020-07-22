@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Update iklan</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
			  <div class="tile-body">
				<form class="form-horizontal" id="submit-form" enctype="multipart/form-data" method="post" action="{{route('admin.iklan.create')}}">
                {{ csrf_field() }}

                    <div class="row">

                        <div class="col-md-9 col-sm-12">
                           <div class="form-group row">
                                <label for="spase" class="col-sm-2 col-form-label">Spase</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="spase" id="spase" placeholder="ID SPASE" value="{{old('spase')}}">
                                    @if ($errors->has('spase'))
                                        <small class="form-text text-muted">{{ $errors->first('spase') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="link" class="col-sm-2 col-form-label">Link Redirect</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="link" id="link" placeholder="Link Redirect" value="{{old('link')}}">
                                    @if ($errors->has('link'))
                                        <small class="form-text text-muted">{{ $errors->first('link') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start Date" value="{{old('start_date')}}">
                                    @if ($errors->has('start_date'))
                                        <small class="form-text text-muted">{{ $errors->first('start_date') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="end_date" id="end_date" placeholder="End Date" value="{{old('end_date')}}">
                                    @if ($errors->has('end_date'))
                                        <small class="form-text text-muted">{{ $errors->first('end_date') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                                <div class="col-sm-10">
                                    <select name="publis" id="" class="form-control">
                                        <option value="Public" {{old('publis')=='Public'? 'selected' : '' }} >Public</option>
                                        <option value="Private" {{old('publis')=='Private'? 'selected' : '' }} >Private</option>
                                    </select>
                                    @if ($errors->has('publis'))
                                        <small class="form-text text-muted">{{ $errors->first('publis') }}</small>
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
                            <img src="{{asset('images/thumbnail.svg')}}" width="100%" class="rounded" alt="thumbnail" id="foto">
                        </div>
                    </div>
                    <input type="hidden" name="redirect" value="{{url()->previous()}}">
				</form>

			  </div>
			  <div class="tile-footer">
				<div class="row">
				  <div class="col-md-8 col-md-offset-3">
					<button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('submit-form').submit();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>
					<a class="btn btn-default" href="{{route('admin.iklan')}}"><i class="fa fa-fw fa-lg fa-home"></i>Home Iklan</a>
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
            $('#foto').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
