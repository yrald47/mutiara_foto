@extends('home')

@section('title')
	Packages
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
                    <form id="form_validation" method="POST" action="{{ route('packages.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Kode Paket</label>
                                <input type="text" class="form-control @error('kode_paket') is-invalid @enderror" name="kode_paket" value="{{old('kode_paket')}}" required>
                                @error('kode_paket')
                                    <label id="name-error" class="error" for="kode_paket">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Nama Paket</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama')}}" required>
                                @error('nama')
                                    <label id="name-error" class="error" for="nama">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Harga Paket</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{old('harga')}}" required>
                                @error('harga')
                                    <label id="name-error" class="error" for="harga">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Foto Paket</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{old('foto')}}" required>
                                @error('foto')
                                    <label id="name-error" class="error" for="foto">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Deskripsi Paket</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"></textarea>
                                @error('deskripsi')
                                    <label id="name-error" class="error" for="deskripsi">{{ $message }}</label>
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
