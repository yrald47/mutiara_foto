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
                <a href="{{route('services.create')}}" class="btn btn-success btn-sm">Add Package</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dt-mant-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Jasa</th>
                                <th>Nama Jasa</th>
                                <th>Deskripsi Jasa</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $i => $row)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $row->kode_jasa }}</td>
                                <td>{{ $row->nama }}</td>
                                <td> {{$row->deskripsi}} </td>
                                <td> {{$row->harga}} </td>
                                <td>
                                    <div style="display:flex;">
                                        <a href="{{route('services.edit',$row->kode_jasa)}}" class="btn btn-warning btn-sm ml-1">Edit</a>
                                            &nbsp;
                                        <form id="delete_form{{$row->id}}" method="POST" action="{{ route('services.destroy',$row->kode_jasa) }}"  onclick="return confirm('Are you sure?')">
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
