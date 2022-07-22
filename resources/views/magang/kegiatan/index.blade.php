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
                <a href="{{route('kegiatan.create')}}" class="btn btn-success btn-sm">Add New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dt-mant-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tanggal</th>
                                <th>Kegiatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kegiatans as $key=>$row)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ date_format(date_create($row->date),"d/m/Y") }}</td>
                                <td>{{ $row->kegiatan }}</td>
                                <td>
                                    <div style="display:flex;">
                                        @if ($row->verifikasi==0)
                                            <a href="{{route('kegiatan.edit',$row->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                        @endif
                                        
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
