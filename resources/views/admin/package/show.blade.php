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
                    <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{url('storage/'.$package->foto)}}" alt="..." /></div>
                    <div class="col-lg-5">
                        <div class="text-center">
                          <h3 class="mt-0">{{$package->nama}}</h3>
                          <p class="text-muted mb-5">{{$package->deskripsi}}</p>
                          <p>Rp. {{$package->harga}} </p>
                        </div>
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
