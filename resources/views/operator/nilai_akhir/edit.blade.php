@extends('home')

@section('title')
	Operators
@endsection

@section('extra-css')

@endsection

@section('index')
    <div class="content">
        <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Nilai Akhir</h5>
              </div>
              <div class="card-body">
                <form id="form_validation" method="POST" action="{{ route('nilai_akhir.update',$magang->id) }}">
                    {{ csrf_field() }}
                        <div>
                            <table class="table">
                                <tr>
                                    <th>Tugas</th>
                                    <th>Deskripsi</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach($tugas as $key=>$row)
                                    <tr>
                                        <td>{{ $row->tugas }}</td>
                                        <td>{{ $row->deskripsi }}</td>
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
                                    @php
                                        $total += $row->nilai;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td class="font-weight-bold text-center" colspan="2">Nilai Tugas</td>
                                    <td colspan="2">{{$total/count($tugas)}}</td>
                                </tr>
                            </table>
                        </div>
                        <div>
                            <table class="table">
                                <tr>
                                    <th>Kegiatan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach($kegiatans as $key=>$row)
                                    <tr>
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
                            </table>
                        </div>
                        <div class="form-group">
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-line">
                                <label class="form-label">Nilai Kegiatan</label>
                                <input type="number" class="form-control @error('kegiatan') is-invalid @enderror" name="kegiatan" value="{{$penilaian->nilai_kegiatan}}" required>
                                @error('kegiatan')
                                    <label id="name-error" class="error" for="kegiatan">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-line">
                                <label class="form-label">Nilai Kepribadian</label>
                                <input type="number" class="form-control @error('kepribadian') is-invalid @enderror" name="kepribadian" value="{{$penilaian->nilai_kepribadian}}" required>
                                @error('kepribadian')
                                    <label id="name-error" class="error" for="kepribadian">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')

@endsection
