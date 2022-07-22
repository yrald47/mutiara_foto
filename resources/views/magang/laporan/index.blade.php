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
                <h3>Kegiatan</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dt-mant-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Laporan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Laporan Kegiatan</td>
                                <td>
                                    <div style="display:flex;">
                                        <a href="{{route('laporankegiatan')}}" class="btn btn-warning btn-sm">Download</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Laporan Tugas</td>
                                <td>
                                    <div style="display:flex;">
                                        <a href="{{route('laporantugas')}}" class="btn btn-warning btn-sm">Download</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Laporan Akhir</td>
                                <td>
                                    <div style="display:flex;">
                                        <a href="{{route('laporanakhir')}}" class="btn btn-warning btn-sm">Download</a>
                                    </div>
                                </td>
                            </tr>
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
