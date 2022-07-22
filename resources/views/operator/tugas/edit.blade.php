@extends('home')

@section('title')
    Edit Tugas
@endsection

@section('extra-css')

@endsection

@section('index')
<div class="content">
        <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Tugas Peserta Magang</h5>
              </div>
              <div class="card-body">

              <form id="form_validation" method="POST" action="{{ route('list_tugas.update',$tugas->id) }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="_method" type="hidden" value="PUT">
                            
                            <div class="form-line">
                                <label class="form-label">Tugas</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$tugas->tugas}}" required>
                                @error('nama')
                                    <label id="name-error" class="error" for="nama">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Detail Tugas</label>
                                <textarea class="form-control @error('detail') is-invalid @enderror" name="detail" required name="detail">{{$tugas->deskripsi}}</textarea>
                                @error('detail')
                                    <label id="name-error" class="error" for="detail">{{ $message }}</label>
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
