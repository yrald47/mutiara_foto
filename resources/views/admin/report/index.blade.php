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
                <h3>Reports</h3>
                <!-- <a href="{{route('packages.create')}}" class="btn btn-success btn-sm disabled">Add Transaction</a> -->
            </div>
            <div class="card-body">
                <div class="form-group" id="response">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rangeReport" id="harian" value="harian">
                        <label class="form-check-label" for="harian">Harian</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rangeReport" id="bulanan" value="bulanan" checked>
                        <label class="form-check-label" for="bulanan">Bulanan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rangeReport" id="tahunan" value="tahunan">
                        <label class="form-check-label" for="tahunan">Tahunan</label>
                    </div>
                </div>
                <form id="form_validation"> <!-- action="javascript(0)"> method="POST" action="{{ route('services.store') }}" -->
                    {{ csrf_field() }}
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="form-label">Waktu Booking</label>
                            <input id="report" type="month" class="form-control @error('month') is-invalid @enderror" name="report" max="<?php echo date('Y-n', time()) ?>">
                            @error('month')
                            <label id="name-error" class="error" for="date">Tes {{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <input id="submit_button" type="button" class="btn btn-primary waves-effect float-right" value="SUBMIT">
                            <!-- <button id="submit_button" type="submit" class="btn btn-primary waves-effect float-right">SUBMIT</button> -->
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dt-mant-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Nama Paket</th>
                                <th>Customer</th>
                                <th>Tanggal dan Waktu Booking</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="report_body">
                            <!-- @foreach($booking as $i => $row)
                            <tr>
                                <td> {{ $i+1 }} </td>
                                <td> {{ $row->kode_booking }} </td>
                                <td> {{ $row->nama }} </td>
                                <td> {{$row->username}} </td>
                                <td> {{$row->tanggal_take}} {{$row->jam_take}} </td>
                                <td> {{$row->status}} </td>
                                <td>
                                    <div style="display:flex;">
                                        <a href="{{route('packages.show',$row->kode_paket)}}" class="btn btn-success btn-sm">Ambil</a>
                                            &nbsp;
                                        <form id="delete_form{{$row->id}}" method="POST" action="{{ route('packages.destroy',$row->kode_paket) }}"  onclick="return confirm('Are you sure?')">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit">Tolak</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach -->
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
<script>

$(document).ready(function() {
    var today = new Date();
    var today_format = today.getFullYear() + "-" + (today.getMonth()+1);
    var today_full_format = today.getFullYear() + "-" + (today.getMonth()+1) + "-" + today.getDate();
    console.log("today: "+ today_full_format);
    $('input:radio[name=rangeReport]').change(function() {
        if (this.value == 'harian') {
            console.log("Harian selected");
            $('#report').attr({'type': 'date', 'max': today_full_format});
        }
        else if (this.value == 'bulanan') {
            console.log("Bulanan selected");
            $('#report').attr({'type': 'month', 'max': today_format});
        }
        else if (this.value == 'tahunan') {
            console.log("Tahunan selected");
            $('#report').attr({'type': 'number', 'max': today.getFullYear()});
        }
    });

    $("#submit_button").click(function(){
        var range = $("#report").val();
        var range_report = $('input:radio[name=rangeReport]').val();
        console.log("range: " + range);
        $.ajax({
            type:'POST',
            url:'/reportresult',
            data:{
                'range':  range, 
                'tipe': range_report, 
                '_token': '{{csrf_token()}}'
            },
            success:function(data) {
                console.log(data['data'])
                $("#report_body").html("");
                $.each(data, function() {
                    $.each(this, function(k, v) {
                        var row = $("<tr><td>" + (k+1) 
                                    + "</td><td>" + v.kode_booking 
                                    + "</td><td>" + v.nama 
                                    + "</td><td>" + v.username 
                                    + "</td><td>"+ v.tanggal_take 
                                    + "</td><td>" + v.status + "</td></tr>");
                        $("#report_body").append(row);
                    });
                });
            }
        });
    });
});
</script>
@endsection
