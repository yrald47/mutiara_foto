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
                <h3>Reports</h3>
                <!-- <a href="{{route('packages.create')}}" class="btn btn-success btn-sm disabled">Add Transaction</a> -->
            </div>
            <div class="card-body">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rangeReport" id="harian" value="option1">
                    <label class="form-check-label" for="harian">Harian</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rangeReport" id="bulanan" value="option2">
                    <label class="form-check-label" for="bulanan">Bulanan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rangeReport" id="tahunan" value="option3">
                    <label class="form-check-label" for="tahunan">Tahunan</label>
                </div>
                <form id="form_validation" method="POST" action="{{ route('services.store') }}">
                    <!-- {{ csrf_field() }} -->
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="form-label">Waktu Booking</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{old('date')}}" required>
                            @error('date')
                            <label id="name-error" class="error" for="date">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary waves-effect float-right" type="submit">SUBMIT</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dt-mant-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Nama Paket</th>
                                <th>Customer</th>
                                <th>Tanggal dan Waktu Booking</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- @foreach($booking as $i => $row)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $row->kode_booking }}</td>
                                <td>{{ $row->nama }}</td>
                                <td> {{$row->username}} </td>
                                <td> {{$row->tanggal_take}} {{$row->jam_take}} </td>
                                <td> {{$row->status}} </td>
                                <td>
                                    <div style="display:flex;">
                                        <a href="{{route('packages.show',$row->kode_paket)}}" class="btn btn-success btn-sm">Ambil</a>
                                            &nbsp;
                                        <form id="delete_form{{$row->id}}" method="POST" action="{{ route('packages.destroy',$row->kode_paket) }}"  onclick="return confirm('Are you sure?')">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit">Tolak</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach -->
                        </tbody>
                    </table>
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
