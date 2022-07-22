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
                <form id="form_validation" method="POST" action="{{ route('services.update',$service->kode_jasa) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-line">
                                <label class="form-label">Kode Jasa</label>
                                <input type="text" class="form-control @error('kode_jasa') is-invalid @enderror" name="kode_jasa" value="{{$service->kode_jasa}}" required readonly>
                                @error('kode_jasa')
                                    <label id="name-error" class="error" for="kode_jasa">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Nama Jasa</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$service->nama}}" required>
                                @error('nama')
                                    <label id="name-error" class="error" for="nama">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Harga Jasa</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{$service->harga}}" required>
                                @error('harga')
                                    <label id="name-error" class="error" for="harga">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Deskripsi Jasa</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{$service->deskripsi}}</textarea>
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
