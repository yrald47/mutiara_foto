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
            <div class="card-body">
                <h3>Penilaian Tugas Peserta Magang</h3>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dt-mant-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama Peserta Magang</th>
                                <th>Tugas</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tugas as $key=>$row)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->tugas }}</td>
                                {{-- <td>
                                    <div style="display:flex;">
                                        <a href="{{asset('/storage/'.$row->file)}}" class="underline" target="_blank"><u>File Tugas</u></a>
                                    </div>
                                </td> --}}
                                <td>
                                    @if ($row->nilai)
                                        {{$row->nilai}}
                                    @else
                                        Belum Dinilai
                                    @endif
                                </td>
                                <td>
                                    <div style="display:flex;">
                                        <a href="{{route('penilaians.nilai',[$row->id,$row->magang_id])}}" class="btn btn-warning btn-sm" >Lihat</a>
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
