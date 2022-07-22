@extends('home')

@section('title')
	Magang
@endsection

@section('extra-css')

@endsection

@section('index')
    <div class="content">
        <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Tambah Peserta Magang</h5>
              </div>
              <div class="card-body">
                <form id="form_validation" enctype="multipart/form-data" method="POST" action="{{ route('magangs.store') }}">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">NISN/NIM</label>
                                <input type="number" class="form-control @error('id_magang') is-invalid @enderror" name="id_magang" value="{{old('id_magang')}}" required>
                                @error('id_magang')
                                    <label id="name-error" class="error" for="id_magang">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama')}}" required>
                                @error('nama')
                                    <label id="name-error" class="error" for="nama">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control @error('jk') is-invalid @enderror" name="jk" value="{{old('jk')}}" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="1">Laki-laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                                @error('jk')
                                    <label id="name-error" class="error" for="jk">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Tempat, Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{old('tempat_lahir')}}" required>
                                    <span class="input-group-text">/</span>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{old('tanggal_lahir')}}" required>
                                  </div>
                                @error('tempat_lahir')
                                    <label id="name-error" class="error" for="tempat_lahir">{{ $message }}</label>
                                @enderror
                                @error('tanggal_lahir')
                                    <label id="name-error" class="error" for="tanggal_lahir">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">No. Telp</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">+62</span>
                                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{old('no_hp')}}" required>
                                </div>
                                
                                @error('no_hp')
                                    <label id="name-error" class="error" for="no_hp">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Akun Instagram</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" class="form-control @error('medsos') is-invalid @enderror" name="medsos" value="{{old('medsos')}}" required>
                                </div>
                                @error('medsos')
                                    <label id="name-error" class="error" for="medsos">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Alamat Domisili</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{old('alamat')}}" required>
                                @error('alamat')
                                    <label id="name-error" class="error" for="alamat">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Asal Sekolah / Perguruan Tinggi</label>
                                <input type="text" class="form-control @error('institusi') is-invalid @enderror" name="institusi" value="{{old('institusi')}}" required>
                                @error('institusi')
                                    <label id="name-error" class="error" for="institusi">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Agama</label>
                                <select class="form-control @error('agama_id') is-invalid @enderror" name="agama_id" value="{{old('agama_id')}}" required>
                                    <option value="">Pilih Agama</option>
                                    @foreach ($agamas as $item)
                                        <option value="{{$item->id}}">{{$item->nama_agama}}</option>
                                    @endforeach
                                </select>
                                @error('agama_id')
                                    <label id="name-error" class="error" for="agama_id">{{ $message }}</label>
                                @enderror
                            </div>   
                            <div class="form-line">
                                <label class="form-label">Penanggung Jawab</label>
                                <select class="form-control @error('operator_id') is-invalid @enderror" name="operator_id" value="{{old('operator_id')}}" required>
                                    <option value="">Pilih Penanggung Jawab</option>
                                    @foreach ($operators as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('operator_id')
                                    <label id="name-error" class="error" for="operator_id">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Pas Foto</label>
                                <input type="file" class="form-control @error('pas_foto') is-invalid @enderror" name="pas_foto" value="{{old('status')}}" >
                                @error('pas_foto')
                                    <label id="name-error" class="error" for="pas_foto">{{ $message }}</label>
                                @enderror 
                            </div>
                            <div class="form-line">
                                <label class="form-label">Foto KTP</label>
                                <input type="file" class="form-control @error('foto_ktp') is-invalid @enderror" name="foto_ktp" value="{{old('foto_ktp')}}" >
                                @error('foto_ktp')
                                    <label id="name-error" class="error" for="foto_ktp">{{ $message }}</label>
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
