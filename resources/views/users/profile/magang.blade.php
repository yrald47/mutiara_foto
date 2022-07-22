@extends('home')

@section('title')
   User Profile
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
                  <img src="{{url('storage/'.$pengguna->pas_foto)}}" alt="{{Auth::user()->name}}" class="avatar border-gray"/>
                  <img src="{{url('storage/'.$pengguna->foto_ktp)}}" alt="{{Auth::user()->name}}" class="border-gray"/>
                    <!-- <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="..."> -->
                    <h5 class="title">{{ Auth::user()->username }}</h5>
                  </a>
                  <p class="description">
                    <!-- {{ Auth::user()->name }} -->
                  </p>
                </div>
                <p class="description text-center">
                {{ Auth::user()->name }}<br>{{ Auth::user()->email }}<br>{{ Auth::user()->mobile }}
                </p>
              </div>

            </div>
          </div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="card">
            <div class="">
                <h3>
                    User Profile
                </h3>
            </div>
            <div class="body">
                <form id="form_validation" method="POST" action="{{ route('profile.update',$user->id) }}" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                    <div class="form-group ">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{$user->username}}" placeholder="NIM" required autofocus readonly>
                        @error('nim')
                            <label id="name-error" class="error" for="nim">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" placeholder="Email Id" required autofocus>
                        @error('email')
                            <label id="email-error" class="error" for="email">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-line mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$pengguna->nama}}" required>
                        @error('nama')
                            <label id="name-error" class="error" for="nama">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-line">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-control @error('jk') is-invalid @enderror" name="jk" value="{{old('jk')}}" required>
                            @foreach ($genders as $key=>$item)
                                <option value="{{$key}}" 
                                    @if ($key==$pengguna->jk)
                                        selected
                                    @endif
                                >{{$item}}</option>
                            @endforeach
                        </select>
                        @error('jk')
                            <label id="name-error" class="error" for="jk">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-line">
                        <label class="form-label">Tempat, Tanggal Lahir</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{$pengguna->tempat_lahir}}" required>
                            <span class="input-group-text">/</span>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{$pengguna->tanggal_lahir}}" required>
                          </div>
                        @error('tempat_lahir')
                            <label id="name-error" class="error" for="tempat_lahir">{{ $message }}</label>
                        @enderror
                        @error('tanggal_lahir')
                            <label id="name-error" class="error" for="tanggal_lahir">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-line">
                        <label class="form-label">No. Telp</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">+62</span>
                            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{$pengguna->no_hp}}" required>
                        </div>
                        
                        @error('no_hp')
                            <label id="name-error" class="error" for="no_hp">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-line">
                        <label class="form-label">Akun Instagram</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="text" class="form-control @error('medsos') is-invalid @enderror" name="medsos" value="{{$pengguna->medsos}}" required>
                        </div>
                        @error('medsos')
                            <label id="name-error" class="error" for="medsos">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-line">
                        <label class="form-label">Alamat Domisili</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{$pengguna->alamat_domisili}}" required>
                        @error('alamat')
                            <label id="name-error" class="error" for="alamat">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-line">
                        <label class="form-label">Asal Sekolah / Perguruan Tinggi</label>
                        <input type="text" class="form-control @error('institusi') is-invalid @enderror" name="institusi" value="{{$pengguna->asal_institusi}}" required>
                        @error('institusi')
                            <label id="name-error" class="error" for="institusi">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-line">
                        <label class="form-label">Agama</label>
                        <select class="form-control @error('agama_id') is-invalid @enderror" name="agama_id" value="{{old('agama_id')}}" required>
                            <option value="">Pilih Agama</option>
                            @foreach ($agamas as $item)
                                <option value="{{$item->id}}" @if ($item->id==$pengguna->agama_id)
                                    selected
                                @endif>{{$item->nama_agama}}</option>
                            @endforeach
                        </select>
                        @error('agama_id')
                            <label id="name-error" class="error" for="agama_id">{{ $message }}</label>
                        @enderror
                    </div>   
                    <div class="form-line">
                        <label class="form-label">Penanggung Jawab</label>
                        <select class="form-control @error('operator_id') is-invalid @enderror" name="operator_id" value="{{old('operator_id')}}" required>
                            <option value="">Pilih Penanggung Jawab</option>
                            @foreach ($operators as $item)
                                <option value="{{$item->id}}" @if ($item->id==$pengguna->operator_id)
                                    selected
                                @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('operator_id')
                            <label id="name-error" class="error" for="operator_id">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-line">
                        <label class="form-label">Pas Foto</label>
                        <input type="file" class="form-control @error('pas_foto') is-invalid @enderror" name="pas_foto" value="{{old('status')}}" >
                        @error('pas_foto')
                            <label id="name-error" class="error" for="pas_foto">{{ $message }}</label>
                        @enderror 
                    </div>
                    <div class="form-line">
                        <label class="form-label">Foto KTP</label>
                        <input type="file" class="form-control @error('foto_ktp') is-invalid @enderror" name="foto_ktp" value="{{old('foto_ktp')}}" >
                        @error('foto_ktp')
                            <label id="name-error" class="error" for="foto_ktp">{{ $message }}</label>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
