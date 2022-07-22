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
                <h3>Nilai Akhir</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dt-mant-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama Lengkap</th>
                                <th>Asal Sekolah / PT</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($magangs as $key=>$row)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->asal_institusi }}</td>
                                <td>
                                    @if($row->nilai_kepribadian!=0&&$row->nilai_kepribadian!=0)
                                        <span class="badge badge-success">Sudah Dinilai</span>
                                    @else
                                        <span class="badge badge-danger">Belum Dinilai</span>
                                    @endif
                                </td>
                                <td>
                                    <div style="display:flex;">
                                        <a href="{{route('nilai_akhir.edit',$row->id)}}" class="btn btn-warning btn-sm">Nilai</a>
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
