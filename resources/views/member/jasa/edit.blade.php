@extends('home')

@section('title')
	Operator
@endsection

@section('extra-css')

@endsection

@section('index')
<div class="content">
<!-- Vertical Layout -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card card-stats">
            @include('errors.custom-message')
            <div class="">
                <h3>Detail Package</h3>
            </div>
            <div class="card-body">
                <div class="row gx-4 gx-lg-5 align-items-center my-5">
                    {{-- <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{url('storage/'.$se->foto)}}" alt="..." /></div> --}}
                    <div class="col-lg-12">
                        <div class="text-center">
                          <h3 class="mt-0">{{$service->nama}}</h3>
                          <p class="text-muted mb-5">{{$service->deskripsi}}</p>
                          <p>Rp. {{$service->harga}} </p>
                        </div>
                        <form id="form_validation" method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="kode_jasa" value="{{$service->kode_jasa}}" hidden readonly>
                                    <div class="form-line">
                                        <label class="form-label">Jumlah Foto</label>
                                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{$dservice->jumlah}}" placeholder="Jumlah Foto" required>
                                        @error('jumlah')
                                            <label id="name-error" class="error" for="jumlah">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-line">
                                        <label class="form-label">Tanggal Pengambilan Barang</label>
                                        <input type="date" class="form-control @error('tanggal_take') is-invalid @enderror" name="tanggal_take" value="{{$dservice->tanggal_take}}" required>
                                        @error('tanggal_take')
                                            <label id="name-error" class="error" for="tanggal_take">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    @if ($dservice->file)
                                        <span>{{$dservice->file}}</span>
                                    @endif
                                    <div class="form-line">
                                        <label class="form-label">Foto ( .rar kalau lebih dari satu )</label>
                                        <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{old('file')}}">
                                        @error('file')
                                            <label id="name-error" class="error" for="file">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary waves-effect text-center" type="submit">Book</button>
                            </div>
                            
                        </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Vertical Layout -->

</div>
@endsection

@section('extra-script')

@endsection
