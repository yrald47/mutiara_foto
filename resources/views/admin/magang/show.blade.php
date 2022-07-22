@extends('home')

@section('title')
   Detail Peserta Magang
@endsection

@section('extra-css')
@endsection

@section('index')
<div class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <!-- <img src="../assets/img/damir-bosnjak.jpg" alt="..."> -->
                </div>
                <div class="card-body">
                    <div class="author">
                    <a href="#">
                    <img src="{{asset('storage/'.$magang->pas_foto)}}" alt="{{Auth::user()->name}}" class="avatar border-gray"/>
                        <!-- <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="..."> -->
                        <h5 class="title">{{ Auth::user()->name }}</h5>
                    </a>
                    <p class="description">
                        <!-- {{ Auth::user()->name }} -->
                    </p>
                    </div>
                    <p class="description text-center"> {{$magang->id}} </p>
                    <p class="description text-center"> {{$user->email}} </p>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="card">
                <div class="">
                    <h3>
                        Detail Peserta Magang
                    </h3>
                </div>
                <div class="body">
                    <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">Nama</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0"> {{$magang->nama}} </p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">Jenis Kelamin</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                @if ($magang->jk == 1)
                                    Laki-Laki
                                @elseif($magang->jk == 2)
                                    Perempuan
                                @endif
                            </p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">Tempat / Tanggal Lahir</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$magang->tempat_lahir}}/ {{$magang->tanggal_lahir}} </p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">No HP</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">+62{{$magang->no_hp}}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">Akun Instagram</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{'@'.$magang->medsos}}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">Alamat Domisili</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$magang->alamat_domisili}}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">Asal Sekolah / Perguruan Tinggi</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$magang->asal_institusi}}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">Agama</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">
                              @if ($magang->agama_id)
                                {{$agamas[$magang->agama_id]}}
                              @endif
                              
                            </p>
                          </div>
                        </div>
                        @role('admin')
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">Penanggung Jawab</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">
                              @if ($magang->operator_id)
                                {{$operators[$magang->operator_id]}}
                              @endif
                            </p>
                          </div>
                        </div>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
