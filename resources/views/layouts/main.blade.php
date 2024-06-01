<!DOCTYPE html>
<html lang="en" data-theme='dark'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />

    {{-- INI UNTUK TEMPLATE UMUM --}}
     <!-- favicon -->
     <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png" />
     <!-- google font -->
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" />
     <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
     <!-- fontawesome -->
     <link rel="stylesheet" href="assets/css/all.min.css" />
     <!-- bootstrap -->
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
     <!-- owl carousel -->
     <link rel="stylesheet" href="assets/css/owl.carousel.css" />
     <!-- magnific popup -->
     <link rel="stylesheet" href="assets/css/magnific-popup.css" />
     <!-- animate css -->
     <link rel="stylesheet" href="assets/css/animate.css" />
     <!-- mean menu css -->
     <link rel="stylesheet" href="assets/css/meanmenu.min.css" />
     <!-- main style -->
     <link rel="stylesheet" href="assets/css/main.css" />
     
     <!-- responsive -->
     <link rel="stylesheet" href="assets/css/responsive.css" />
     <link rel="stylesheet" href="assets/css/mystyle.css" />

    {{-- STYLING PERCETAKAN --}}
    <link rel="stylesheet" href="assets/css/printStyle.css">
     {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" /> --}}
      {{-- <link rel="stylesheet" href="asses"> --}}
     {{-- END OF TEMPLATE UMUM --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ $title }}</title>

    {{-- ===== daisyUI  ===== --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.4/dist/full.css" rel="stylesheet" type="text/css" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    {{-- ===== daisyUI  ===== --}}
   
    <script src="https://unpkg.com/leaflet.label@0.2.4/dist/leaflet.label.js"></script>

    <style>
        body p{
          font-family: 'Poppins'
        }
        #slider1{
            /* background-color: red; */
            
            background-repeat: no-repeat;
            background-size: 100%;
            color: blue;
            width: 100%;
            height: 100vh;  
            background-image: url('assets/img/sepeda besar.jpg') !important;
        }
        
        .my-tx-color{
          color: #f28123;
        }
        .my-bg-color{
          background-color: #f28123;
        }

        
        /* #map { height: 180px; } */
    </style>
    @yield('style')
 
</head>

<body class="bg-white h-screen">
   
      <!-- header -->
      <div class="no-print h-20 flex items-center top-header-area my-navbar"  id="sticker">
        <div class="w-full container">
          <div class="row">
            <div class=" col-lg-12 col-sm-12 text-center pl-0 pr-3">
              <div class="px-20 main-menu-wrap ">
                
                <!-- logo -->
                <div class="mt-2 my-site-logo flex items-center">
                  <img class="h-12 mr-2" src="assets/img/skripsi/beranda/logo-desa.png" alt="">
                  <a class="" href="{{ route('home') }}">
                    <h3 class="text-4xl font-bold " style="color: white">Benteng Gajah</h3>
                  </a>
                </div>
                <!-- logo -->
  
                <!-- menu start -->
                <nav class="main-menu">
                  <ul>
                    <li class="home">
                      <a href="/">Home</a>
                    </li>
                    
                    <li class="pemerintah"><a href="/pemerintah">Pemerintah</a></li>
                    <li class="visit"><a href="/visit">Peta</a></li>
                    <li class="pemetaan">
                      <a href="/pemetaan">Potensi</a>
                    </li>
                    <li class="berita">
                      <a href="/berita">Berita</a>
                    </li>
                    {{-- <li class="contact"><a href="/contact">Contact us</a></li>
                    <li class="contact"><a href="/testing">Testing</a></li> --}}

                   
                    
                    @if(!session()->has('admin') == 'admin')
                      <li>
                        <div id="admin-btn" class="header-icons">
                          <a class="shopping-cart" > <i class="fas fa-solid fa-right-to-bracket"></i><span onclick="login_admin()" style="hover" class="ml-2">Login</span></a>
                        </div>
                      </li>
                    @endif

                    @if(session()->has('admin'))
                    <li>
                      <a><i class="fas fa-solid fa-user mr-2"></i>Admin</a>
                      <ul class="sub-menu bg-red-400" style="width:max-content ; padding-right:30px !important">

                        @if(session()->has('superadmin'))
                        <li class="w-fit mb-3"><a href="{{ route('kelola-admin') }}"><i class="fa-solid fa-user-group"><span class="ml-2">Kelola Admin</span></i></a></li>
                        @endif

                        <li class="w-fit mb-3"><a href="{{ route('kelola-pemerintah') }}"><i class="fa-solid fa-table-columns"><span class="ml-2">Dashboard</span></i></a></li>
                        <hr>
                        <li class="w-fit"><a href="{{ route('logout') }}" class="shopping-cart" > <i class="fa-solid fa-right-from-bracket"></i><span onclick="login_admin()" style="hover" class="ml-2">Log out</span></a></li>
                      </ul>
                    </li>
                    @endif
                    
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
  
  @yield('container')
  {{-- <footer class="w-full h-fit bg-dark bottom-0 relative">
    <h1 class="text-center">Desa Benteng Gajah</h1>
  </footer> --}}
  {{-- @inclue --}}
  {{-- HALAMAN LOGIN --}}
  <div class="hidden z-20 login_page  fixed top-0 left-0 w-full h-screen flex flex-col items-center justify-center bg-red-800" style="background:rgba(0, 0, 0, 0.5) !important" >
      
    <div class="my-auto opacity-100 bg-white absolute flex justify-center item-center card w-96 bg-base-100 shadow-xl p-4" style="z-index:2">

      <span onclick="login_admin()" class="w-fit material-symbols-outlined" style="cursor:pointer !important">
        keyboard_backspace
        </span>
        <h5 class="text-center text-2xl mb-2 font-bold" >Login Page</h5>

        @if(session()->has('loginError'))
          <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded w-fit mb-3" role="alert">
            <span class="block sm:inline">{{ session('loginError') }}</span>
          </div>      
        @endif
        
        @if(session()->has('loginSucces'))
          <p>Pesan Login : Sukses</p>
        @endif

        <form class=" flex flex-col item-center" action="/login" method="post">
          @csrf
            <input class="w-full mb-3 rounded" name="username" type="text" placeholder="Username" autofocus required>

            @error('username')
              <span>{{ $message }}</span>
            @enderror

            <input class="w-full mb-3 rounded" type="password" name="password" placeholder="password" required>
            <button class="btn btn-primary bg-blue-500" type="submit">Login</button>
        </form>
    </div>
  
  </div>
  {{--  END OF HALAMAN LOGIN --}}


  {{-- ACTION HALAMAN LOGIN --}}
  <script type="text/javascript">
    let adminPage = document.querySelector('.login_page')
    let navbar = document.querySelector('.my-navbar')
    function login_admin(){
        adminPage.classList.toggle('hidden');
        navbar.classList.toggle('disabled');
    }
  </script>
  {{-- END OF ACTION HALAMAN LOGIN --}}

  @yield('script')
  
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>

    <script src="https://kit.fontawesome.com/dcf661361c.js" crossorigin="anonymous"></script>



    {{-- INI UMUM TEMPLATE YAH --}}
         <!-- jquery -->
         <script src="assets/js/jquery-1.11.3.min.js"></script>
         <!-- bootstrap -->
         <script src="assets/bootstrap/js/bootstrap.min.js"></script>
         <!-- count down -->
         <script src="assets/js/jquery.countdown.js"></script>
         <!-- isotope -->
         <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
         <!-- waypoints -->
         <script src="assets/js/waypoints.js"></script>
         <!-- owl carousel -->
         <script src="assets/js/owl.carousel.min.js"></script>
         <!-- magnific popup -->
         <script src="assets/js/jquery.magnific-popup.min.js"></script>
         <!-- mean menu -->
         <script src="assets/js/jquery.meanmenu.min.js"></script>
         <!-- sticker js -->
         <script src="assets/js/sticker.js"></script>
         <!-- main js -->
         <script src="assets/js/main.js"></script>
    {{-- INI AKHIR UMUM TEMPLATE YAH --}}


</body>

</html>