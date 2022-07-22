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
                  {{-- <img src="{{url('storage/profile-pic')}}/{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}" class="avatar border-gray"/> --}}
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
                        <label class="form-label">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{$user->username}}" placeholder="Username" required autofocus readonly>
                        @error('nik')
                            <label id="name-error" class="error" for="nik">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$pengguna->name}}" placeholder="Nama Lengkap" required autofocus>
                        @error('name')
                            <label id="name-error" class="error" for="name">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" placeholder="Email Id" required autofocus>
                        @error('email')
                            <label id="email-error" class="error" for="email">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label class="form-label">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ $pengguna->jabatan }}" required>
                            @error('jabatan')
                                <label id="name-error" class="error" for="jabatan">{{ $message }}</label>
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
