<!DOCTYPE html>
<html>
<head>
	<title>Laporan Kegiatan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
		.ttd {
            height: 80px;
        }
	</style>
</head>
<body class="container">
	
	<center>
		<h5>LAPORAN TUGAS PESERTA MAGANG</h4>
	</center>

        <table class="table table-borderless">
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{$magang->nama}}</td>
            </tr>
            <tr>
                <td>NISN/NIM</td>
                <td>:</td>
                <td>{{$magang->id}}</td>
            </tr>
            <tr>
                <td>Asal Sekolah / Universitas</td>
                <td>:</td>
                <td>{{$magang->asal_institusi}}</td>
            </tr>
            <tr>
                <td>Penanggung Jawab</td>
                <td>:</td>
                <td>{{$operators[$magang->operator_id]}}</td>
            </tr>
            <tr>
                <td>Tanggal Masuk</td>
                <td>:</td>
                <td>{{ $startDate[$magang->periode_id] }}</td>
            </tr>
            <tr>
                <td>Tanggal Keluar</td>
                <td>:</td>
                <td>{{$endDate[$magang->periode_id]}}</td>
        </table>
    
    <table class="table table-bordered">
        <tr>
            <th class="text-center">Tanggal Kegiatan</th>
            <th class="text-center">Deskripsi Kegiatan</th>
            <th class="text-center">Nilai</th>
        </tr>
        @php
            $total = 0;
        @endphp
        @foreach ($tugas as $item)
            <tr>
                <td>{{$item->tugas}}</td>
                <td>{{$item->deskripsi}}</td>
                <td>{{$item->nilai}}</td>
            </tr>
            @php
                $total += $item->nilai;
            @endphp
        @endforeach
        @php
            $total = $total / count($tugas);
        @endphp
        <tr>
            <td colspan="2" class="font-weight-bold text-center">Rata-Rata Nilai</td>
            <td>{{$total}}</td>
        </tr>
    </table>
 
    {{-- <div class="container" > --}}
        <table class="float-right">
            <tr>
                <td>Padang, 1 Januari 2022</td>
            </tr>
            <tr><td>Penanggung Jawab</td></tr>
            <tr><td class="ttd"></td></tr>
            <tr><td>{{$operators[$magang->operator_id]}}</td></tr>
        </table>
    {{-- </div> --}}
</body>
</html>