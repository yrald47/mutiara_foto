@extends('home')

@section('title')
	Operators
@endsection

@section('extra-css')

@endsection

@section('index')
    <div class="content">
        <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Tambah Penanggung Jawab</h5>
              </div>
              <div class="card-body">
                <form id="form_validation" method="POST" action="{{ route('operators.store') }}">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">NIK</label>
                                <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{old('nik')}}" required>
                                @error('nik')
                                    <label id="name-error" class="error" for="nik">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama')}}" required>
                                @error('nama')
                                    <label id="name-error" class="error" for="nama">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{old('jabatan')}}" required>
                                @error('jabatan')
                                    <label id="name-error" class="error" for="jabatan">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')

@endsection
