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
                <h5 class="card-title">{{$tugas->tugas}}</h5>
                <div class="card border">
                    <p>{{$tugas->deskripsi}}</p>

                    <div class="card-body">

                        <p>File Tugas : <a target="_blank" href="{{asset('storage/'.$detail->file)}}" class="btn btn-primary btn-sm">{{$detail->file}}</a></p>
                        <p>Nilai : 
                            @if ($detail->nilai==0)
                                <span class="badge badge-danger">Belum Dinilai</span>
                            @else
                                {{$detail->nilai}}
                            @endif
                            
                        </p>
                        
                        <form id="form_validation" method="POST" action="{{ route('penilaians.nilai',[$tugas->id,$detail->magang_id]) }}">
                            @csrf
                            <div class="form-group">
                                <div class="form-line">
                                    <input name="_method" type="hidden" value="PUT">
                                    
                                    <div class="form-line">
                                        <label class="form-label">Nilai</label>
                                        <input type="number" class="form-control @error('nilai') is-invalid @enderror" name="nilai" value="{{old('nilai')}}" required>
                                        @error('nilai')
                                            <label id="name-error" class="error" for="nilai">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">SUBMIT</button>
                        </form>
                        {{-- <form id="form_validation" method="POST"   action="{{ route('tugas.store',$tugas->id) }}">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="form-line">
                                        <label class="form-label">File Tugas</label>
                                        <input type="file" class="form-control @error('tugas') is-invalid @enderror" name="tugas" value="{{old('tugas')}}" required>
                                        @error('tugas')
                                            <label id="name-error" class="error" for="tugas">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form> --}}
                    </div>
                    
                </div>
              </div>
              
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')

@endsection
