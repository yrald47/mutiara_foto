<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Creative - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('guest/assets/favicon.ico')}}" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('guest/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Mutiara Photography</a>
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                  <li class="nav-item"><a class="nav-link" href="#services">Package</a></li>
                  <li class="nav-item"><a class="nav-link" href="#portfolio">Galery</a></li>
                  <li class="nav-item"><a class="nav-link" href="#contact">About Us</a></li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                      @if (Route::has('login'))
                          @auth
                            <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                          @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                              <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                            @endif
                          @endauth
                      @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Mutiara Photography</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, sequi in voluptatem, eos impedit, qui incidunt temporibus nemo sapiente labore quam architecto recusandae praesentium ullam. Esse quaerat nesciunt pariatur ipsam!</p>
                        <a class="btn btn-primary btn-xl" href="#services">Lihat Paket</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        {{-- <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">We've got what you need!</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! Choose one of our open source, free to download, and easy to use themes! No strings attached!</p>
                        <a class="btn btn-light btn-xl" href="#services">Get Started!</a>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Daftar Paket</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    @foreach ($packages as $item)
                      <div class="col-lg-6 col-md-6 text-center">
                        <div class="mt-5">
                          <div class="card h-100">
                            <img src="{{url('storage/'.$item->foto)}}" class="card-img-top img-responsive" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{$item->nama}}</h5>
                              <p class="card-text">{{$item->deskripsi}}</p>
                              <a href="{{route('login')}}" class="btn btn-primary">Booking</a>
                            </div>
                          </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                  @foreach ($galery as $item)
                    <div class="col-lg-4 col-sm-6">
                      <a class="portfolio-box" href="{{url('storage/'.$item->foto)}}" title="Project Name">
                          <img class="img-fluid" src="{{url('storage/'.$item->foto)}}" alt="..." />
                          <div class="portfolio-box-caption">
                              <div class="project-category text-white-50">{{$item->nama}}</div>
                              <div class="project-name">{{$item->nama}}</div>
                          </div>
                      </a>
                  </div>
                  @endforeach
                    
                </div>
            </div>
        </div>
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">Anda mulai tertarik!</h2>
                <a class="btn btn-light btn-xl" href="#services">Booking Sekarang!</a>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
              <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{url("../guest/assets/img/bg-masthead.jpg")}}" alt="..." /></div>
                <div class="col-lg-5">
                    <div class="text-center">
                      <h2 class="mt-0">Tentang Kami</h2>
                      <hr class="divider" />
                      <p class="text-muted mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et odio exercitationem corporis vitae odit expedita, beatae ut, nulla repellendus eius eos iusto amet quod placeat, a suscipit doloribus quae libero.</p>
                      <a id="package" class="btn btn-primary" href="#package">Lihat Paket</a>
                  </div>
                    
                </div>
              </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2022 - Mutiara Photography</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('guest/js/scripts.js')}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

