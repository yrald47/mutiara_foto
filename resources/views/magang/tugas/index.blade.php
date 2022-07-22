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
            <div class="">
                <h3>Tugas</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dt-mant-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tugas</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tugas as $key=>$row)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $row->tugas }}</td>
                                <td>{{ $row->deskripsi }}</td>
                                <td>
                                    <div style="display:flex;">
                                        <a href="{{route('tugas.show',$row->id)}}" class="btn btn-warning btn-sm">Detail</a>
                                    </div>
                                </td>
                                <td>
                                    @if($row->nilai)
                                        <span class="badge badge-success">Telah Dinilai</span>
                                    @elseif($row->file)
                                        <span class="badge badge-warning">Telah Dikumpulkan</span>
                                    @else
                                        <span class="badge badge-danger">Belum dikumpulkan</span>
                                    @endif
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
