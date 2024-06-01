@extends('layouts/main')

@section('container')


    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
          <div class="circle"></div>
        </div>
      </div>
      <!--PreLoader Ends-->
  

      <!-- Slider -->
      <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider" style="padding-left: 5rem">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                <div class="hero-text">
                  <div class="pl-5 hero-text-tablecell">
                    <h1 id="s1-header">{{ $data[0]->header }}</h1>
                    <p id="s1-span" class="subtitle">{{ $data[0]->span }}</p>
                    <div class="hero-btns">
                      <a href="pemerintah" class="boxed-btn">Profile Desa</a>
                      <a onclick="login_admin()" class="bordered-btn">Login</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="foto">
            <img id="s1-img" src="{{ "assets/img/skripsi/beranda/". $data[0]->image  }}" alt="">
          </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider">
          <div class="container">
            <div class="row">
              <div class="col-lg-10 offset-lg-1 text-center">
                <div class="hero-text">
                  <div class="hero-text-tablecell">
                    <p id="s2-span" class="subtitle">{{ $data[1]->span }}</p>
                    <h1 id="s2-header">{{ $data[1]->header }}</h1>
                    <div class="hero-btns">
                      <a href="potensi" class="boxed-btn">Lihat Potensi</a>
                      <a onclick="login_admin()" class="bordered-btn">Login</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="foto slider2">
            <img id="s2-img" src="{{ "assets/img/skripsi/beranda/". $data[1]->image  }}" alt="">
          </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider ">
          <div class="container">
            <div class="row">
              <div class="col-lg-10 offset-lg-1 text-right">
                <div class="hero-text">
                  <div class="hero-text-tablecell">
                    <p id="s3-span" style="color: white" class="subtitle">{{ $data[2]->span }}</p>
                    <h1 id="s3-header" style="color: #f28123">{{ $data[2]->header }}</h1>
                    <div class="hero-btns">
                      <a href="visit" class="boxed-btn">Kunjungi</a>
                      <a onclick="login_admin()" class="bordered-btn">Login</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="foto slider3">
            <img id="s3-img" src="{{ "assets/img/skripsi/beranda/". $data[2]->image  }}" alt="">
          </div>
          <3></3>
        </div>
      </div>
      <!-- end slider area -->
      
      <script src="assets/js/umum/beranda.js"></script>
     <script type="text/javascript">
        function highlight(){

          list = document.querySelector('.home').classList.add('current-list-item');
        }
        highlight()    
      </script>


@endsection