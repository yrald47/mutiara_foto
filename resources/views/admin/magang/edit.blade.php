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
                <h5 class="card-title">Operator</h5>
              </div>
              <div class="card-body">

              <form id="form_validation" method="POST" action="{{ route('magangs.update',$magang->id) }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="_method" type="hidden" value="PUT">
                            
                            <div class="form-line">
                                <label class="form-label">NISN/NIM</label>
                                <input type="number" class="form-control @error('id_magang') is-invalid @enderror" name="id_magang" value="{{ $magang->id }}" required readonly>
                                @error('id_magang')
                                    <label id="name-error" class="error" for="id_magang">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$magang->nama}}" required readonly>
                                @error('nama')
                                    <label id="name-error" class="error" for="nama">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Waktu Magang</label>
                                <div class="input-group">
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{old('start_date')}}" required>
                                    <span class="input-group-text">Sampai</span>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{old('end_date')}}" required>
                                  </div>
                                @error('start_date')
                                    <label id="name-error" class="error" for="start_date">{{ $message }}</label>
                                @enderror
                                @error('end_date')
                                    <label id="name-error" class="error" for="end_date">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-line">
                                <label class="form-label">Penanggung Jawab</label>
                                <select class="form-control @error('operator_id') is-invalid @enderror" name="operator_id" value="{{$magang->operator_id}}" required>
                                    <option value="">Pilih Penanggung Jawab</option>
                                    @foreach ($operators as $item)
                                        <option value="{{$item->id}}"
                                            @if ($item->id == $magang->operator_id)
                                                selected
                                            @endif
                                            >{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('operator_id')
                                    <label id="name-error" class="error" for="operator_id">{{ $message }}</label>
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
