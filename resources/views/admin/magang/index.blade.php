@extends('home')

@section('title')
	Magang
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
                <h3>List Peserta Magang</h3>
                @role('admin')
                <a href="{{route('magangs.create')}}" class="btn btn-success btn-sm">Add New</a>
                @endrole
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dt-mant-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama Lengkap</th>
                                <th>Asal Sekolah / PT</th>
                                <th>Periode</th>
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
                                    @if ($row->start_date)
                                        {{ date_format(date_create($row->start_date),"d/m/Y")}} 
                                        sampai 
                                        {{ date_format(date_create($row->end_date),"d/m/Y") }}
                                    @else
                                        Periode belum di masukkan
                                    @endif
                                </td>
                                <td>
                                    <div style="display:flex;">
                                        @role('operator')
                                            <a href="{{route('magang.show',$row->id)}}" class="btn btn-warning btn-sm">Detail</a>
                                        @endrole
                                        @role('admin')
                                            <a href="{{route('magangs.show',$row->id)}}" class="btn btn-sucess btn-sm">Detail</a>
                                            <a href="{{route('magangs.edit',$row->id)}}" class="btn btn-warning btn-sm ml-1">Edit</a>
                                                &nbsp;
                                            <form id="delete_form{{$row->id}}" method="POST" action="{{ route('magangs.destroy',$row->id) }}"  onclick="return confirm('Are you sure?')">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                            </form>
                                        @endrole
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
