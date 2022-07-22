@extends('home')

@section('title')
	Tambah Tugas
@endsection

@section('extra-css')

@endsection

@section('index')
    <div class="content">
        <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Tambah Tugas</h5>
              </div>
              <div class="card-body">
                <form id="form_validation" method="POST" action="{{ route('list_tugas.store') }}">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Judul Tugas</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama')}}" required>
                                @error('nama')
                                    <label id="name-error" class="error" for="nama">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Deskripsi Tugas</label>
                                <textarea class="form-control @error('detail') is-invalid @enderror" name="detail" value="{{old('detail')}}" required name="detail"></textarea>
                                @error('detail')
                                    <label id="name-error" class="error" for="detail">{{ $message }}</label>
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
