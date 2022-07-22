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
                                    <label class="form-label">Waktu Booking</label>
                                    <input type="text" name="kode_jasa" value="{{$service->kode_jasa}}" hidden readonly>
                                    <div class="input-group">
                                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{old('date')}}" required>
                                        <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{old('time')}}" required>
                                      </div>
                                    @error('date')
                                        <label id="name-error" class="error" for="date">{{ $message }}</label>
                                    @enderror
                                    @error('time')
                                        <label id="name-error" class="error" for="time">{{ $message }}</label>
                                    @enderror
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
