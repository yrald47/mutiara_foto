@extends('home')

@section('title')
    Edit Kegiatan
@endsection

@section('extra-css')

@endsection

@section('index')
<div class="content">
        <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Kegiatan Harian</h5>
              </div>
              <div class="card-body">

              <form id="form_validation" method="POST" action="{{ route('kegiatan.update',$kegiatan->id) }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="_method" type="hidden" value="PUT">
                            
                            <div class="form-line">
                                <label class="form-label">Tanggal</label>
                                <input type="text" value="{{$kegiatan->date}}" class="form-control @error('nik') is-invalid @enderror" name="nik" required readonly>
                                @error('nik')
                                    <label id="name-error" class="error" for="nik">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Kegiatan</label>
                                <textarea name="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" required> {{$kegiatan->kegiatan}} </textarea>
                                @error('nama')
                                    <label id="name-error" class="error" for="nama">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-script')

@endsection
