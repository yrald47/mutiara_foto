@extends('home')

@section('title')
    Edit Operator
@endsection

@section('extra-css')

@endsection

@section('index')
<div class="content">
        <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Data Penanggung Jawab</h5>
              </div>
              <div class="card-body">

              <form id="form_validation" method="POST" action="{{ route('operators.update',$operator->id) }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="_method" type="hidden" value="PUT">
                            
                            <label class="form-label">NIK</label>
                            <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $operator->id }}" required readonly>
                            @error('nik')
                                <label id="name-error" class="error" for="nik">{{ $message }}</label>
                            @enderror

                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $operator->name }}" required>
                            @error('name')
                                <label id="name-error" class="error" for="name">{{ $message }}</label>
                            @enderror

                            <label class="form-label">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ $operator->jabatan }}" required>
                            @error('jabatan')
                                <label id="name-error" class="error" for="jabatan">{{ $message }}</label>
                            @enderror
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
