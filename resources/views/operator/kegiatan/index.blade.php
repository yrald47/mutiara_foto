@extends('home')

@section('title')
	Kegiatan
@endsection

@section('extra-css')

@endsection

@section('index')
<div class="content">
<!-- Vertical Layout -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card card-stats">
            <div class="">
                <h3>List Kegiatan Peserta Magang</h3>
                <form id="form_validation" method="POST" enctype="multipart/form-data" action="{{ route('kegiatans.store') }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <div class="form-line">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{$date}}" required>
                                @error('date')
                                    <label id="name-error" class="error" for="date">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit">SUBMIT</button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dt-mant-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Peserta Magang</th>
                                <th>Kegiatan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kegiatans as $key=>$row)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $magang[$row->magang_id] }}</td>
                                <td>{{ $row->kegiatan }}</td>
                                <td>
                                    @if ($row->verifikasi == 1)
                                        <span class="badge badge-success">Verified</span>
                                    @else
                                        <span class="badge badge-danger">Not Verified</span>
                                    @endif
                                </td>
                                <td>
                                    <div style="display:flex;">
                                        <a href="{{route('kegiatans.edit',$row->id)}}" class="btn btn-warning btn-sm">LIHAT</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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
