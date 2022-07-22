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
                <h5 class="card-title">{{$magangs[$kegiatan->magang_id]}}</h5>
                <div class="card border">
                    <p>{{date_format(date_create($kegiatan->date),"d/m/Y")}}</p>
                    <p>{{$kegiatan->kegiatan}}</p>
                   
                    {{-- @if($detail->file) --}}
                        {{-- <a href="{{asset('storage/'.$kegiatan->file)}}" class="btn btn-primary btn-sm">Lihat Tugas</a> --}}
                    {{-- @endif --}}

                    @if($kegiatan->verifikasi!=1)
                        {{-- <div class="card-body"> --}}
                            <form id="form_validation" method="POST" enctype="multipart/form-data" action="{{ route('kegiatans.update',$kegiatan->id) }}">
                                @csrf
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="_method" type="hidden" value="PUT">
                                        <input type="hidden" name="status" value="1">
                                        {{-- <div class="form-line">
                                            <label class="form-label">File Tugas</label>
                                            <input type="file" class="form-control @error('tugas') is-invalid @enderror" name="tugas" value="{{old('tugas')}}" required>
                                            @error('tugas')
                                                <label id="name-error" class="error" for="tugas">{{ $message }}</label>
                                            @enderror
                                        </div> --}}
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm" type="submit">VERIFIKASI</button>
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
                        {{-- </div> --}}
                    @else
                            <div>
                                <span class="badge badge-success">Verified</span>
                            </div>
                        
                    @endif
                    
                </div>
              </div>
              
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')

@endsection
