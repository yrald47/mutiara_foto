<div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          {{ Auth::user()->name }}
          <br>
          @if (Auth::user()->id==1)
            {{ Auth::user()->username }}
          @else
            <div class="container">
              {{ Auth::user()->getNama() }}
            </div>
          @endif
          {{-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> --}}
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li {{Route::is('home')? 'class=active':''}}>
            <a href="{{route('home')}}">
              <i class="nc-icon nc-bank"></i>
              <p>Beranda</p>
            </a>
          </li>

          @role('admin')
            <li {{Route::is('packages.index')? 'class=active':''}}>
              <a href="{{route('packages.index')}}">
                <i class="nc-icon nc-single-02"></i>
                <p>Package</p>
              </a>
            </li>

            <li {{Route::is('galleries.index')? 'class=active':''}}>
              <a href="{{route('galleries.index')}}">
                <i class="nc-icon nc-single-02"></i>
                <p>Galery</p>
              </a>
            </li>

            <li {{Route::is('services.index')? 'class=active':''}}>
              <a href="{{route('services.index')}}">
                <i class="nc-icon nc-single-02"></i>
                <p>Service</p>
              </a>
            </li>

            <li {{Route::is('transaction.index')? 'class=active':''}}>
              <a href="{{route('transaction.index')}}">
                <i class="nc-icon nc-single-02"></i>
                <p>Transaction</p>
              </a>
            </li>

            <li {{Route::is('report.index')? 'class=active':''}}>
              <a href="{{route('report.index')}}">
                <i class="nc-icon nc-single-02"></i>
                <p>Report</p>
              </a>
            </li>

          @endrole

      @role('member')
      <li {{Route::is('package.index')? 'class=active':''}}>
        <a href="{{route('package.index')}}">
          <i class="nc-icon nc-single-02"></i>
          <p>Package</p>
        </a>
      </li>
      <li {{Route::is('booking.index')? 'class=active':''}}>
        <a href="{{ route('booking.index') }}">
          <i class="nc-icon nc-circle-10"></i>
          <p>Booking</p>
        </a>
      </li>

      <li {{Route::is('service.index')? 'class=active':''}}>
        <a href="{{route('service.index')}}">
          <i class="nc-icon nc-single-02"></i>
          <p>Service</p>
        </a>
      </li>
      @endrole
        </ul>
      </div>
</div>
