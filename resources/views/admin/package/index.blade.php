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
                <h3>Package</h3>
                <a href="{{route('packages.create')}}" class="btn btn-success btn-sm">Add Package</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dt-mant-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Paket</th>
                                <th>Nama Paket</th>
                                <th>Harga Paket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($packages as $i => $row)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $row->kode_paket }}</td>
                                <td>{{ $row->nama }}</td>
                                <td> {{$row->harga}} </td>
                                <td>
                                    <div style="display:flex;">
                                        <a href="{{route('packages.show',$row->kode_paket)}}" class="btn btn-success btn-sm">Detail</a>
                                        <a href="{{route('packages.edit',$row->kode_paket)}}" class="btn btn-warning btn-sm ml-1">Edit</a>
                                            &nbsp;
                                        <form id="delete_form{{$row->id}}" method="POST" action="{{ route('packages.destroy',$row->kode_paket) }}"  onclick="return confirm('Are you sure?')">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                        </form>
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
