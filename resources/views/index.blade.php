@extends('layouts.main')

@section('container')
 <!--PreLoader-->
 <div class="loader">
    <div class="loader-inner">
      <div class="circle"></div>
    </div>
  </div>
  <!--PreLoader Ends-->

  <!-- header -->
  <div class="top-header-area" id="sticker">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-12 text-center">
          <div class="main-menu-wrap">
            <!-- logo -->
            <div class="my-site-logo">
              <a href="index.html">
                <h3 style="color: white">Desa Talumae</h3>
              </a>
            </div>
            <!-- logo -->

            <!-- menu start -->
            <nav class="main-menu">
              <ul>
                <li class="current-list-item">
                  <a href="#">Home</a>
                  <ul class="sub-menu">
                    <li><a href="index.html">Static Home</a></li>
                    <li><a href="index_2.html">Slider Home</a></li>
                  </ul>
                </li>
                <li><a href="about.html">About</a></li>
                <!-- <li>
                  <a href="#">Pages</a>
                  <ul class="sub-menu">
                    <li><a href="404.html">404 page</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="checkout.html">Check Out</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="news.html">News</a></li>
                    <li><a href="shop.html">Shop</a></li>
                  </ul>
                </li> -->
                <li>
                  <a href="/maps">Maps</a>
                </li>
                <li><a href="contact.html">Contact</a></li>
                <!-- <li>
                  <a href="shop.html">Shop</a>
                  <ul class="sub-menu">
                    <li><a href="shop.html">Shop</a></li>
                    <li><a href="checkout.html">Check Out</a></li>
                    <li><a href="single-product.html">Single Product</a></li>
                    <li><a href="cart.html">Cart</a></li>
                  </ul>
                </li> -->
                <li>
                  <div class="header-icons">
                    <a class="shopping-cart" href="login.html"> <i class="fas fa-solid fa-user"></i> <span style="margin-left: 0.5rem">Admin</span></a>
                  </div>
                </li>
              </ul>
            </nav>
            <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
            <div class="mobile-menu"></div>
            <!-- menu end -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end header -->

  <!-- search area -->
  <div class="search-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="close-btn"><i class="fas fa-window-close"></i></span>
          <div class="search-bar">
            <div class="search-bar-tablecell">
              <h3>Search For:</h3>
              <input type="text" placeholder="Keywords" />
              <button type="submit">Search <i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end search area -->

  <!-- Slider -->
  <div class="homepage-slider">
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-1" style="padding-left: 5rem">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
            <div class="hero-text">
              <div class="hero-text-tablecell">
                <h1>DESA TALUMAE</h1>
                <p class="subtitle">Kec. Sidenreng, Kab. Sidrap</p>
                <div class="hero-btns">
                  <a href="dashboard.html" class="boxed-btn">Visit Talumae</a>
                  <a href="contact.html" class="bordered-btn">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="foto slider1"></div>
    </div>
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-2">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 offset-lg-1 text-center">
            <div class="hero-text">
              <div class="hero-text-tablecell">
                <p class="subtitle">Pontensi desa talumae</p>
                <h1>PERTANIAN & PERKEBUNAN</h1>
                <div class="hero-btns">
                  <a href="shop.html" class="boxed-btn">Show</a>
                  <a href="contact.html" class="bordered-btn">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="foto slider2"></div>
    </div>
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 offset-lg-1 text-right">
            <div class="hero-text">
              <div class="hero-text-tablecell">
                <p style="color: white" class="subtitle">Masyarakat desa</p>
                <h1 style="color: #f28123">RAMAH DAN DAMAI</h1>
                <div class="hero-btns">
                  <a href="shop.html" class="boxed-btn">Visit Talumae</a>
                  <a href="contact.html" class="bordered-btn">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="foto slider3"></div>
    </div>
  </div>

  @endsection