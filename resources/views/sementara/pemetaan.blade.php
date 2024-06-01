@extends('layouts.main')

@section('style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Turf.js/7.0.0-alpha.0/turf.min.js"></script>
{{-- <script src="https://unpkg.com/@turf/turf@7.0.17/umd/turf.min.js"></script> --}}

{{-- <script src="https://unpkg.com/@turf/turf@7.0.17/umd/turf.min.js"></script> --}}

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>

<script type="text/javascript" src="../assets/js/jquery-ajax.js"></script>


<style>
    
    #map{
        height: 89vh;
        /* border-radius: 1rem; */
        /* overflow-y: hidden */
        min-width: 100%;
        /* margin-top: 2rem; */
        /* outline-style: solid;
        outline-color: white;
        outline-width: 0.5rem */
    }
    
    .color-bar{
      width: 1rem;
      height: 1rem;
    }
    .color-line{
      width: 1rem;
      height: 0.2rem;
    }
    .white-line{
        border: 1px solid black;
    }
    .content-legend{
        display: flex;
        flex-direction: column;
        /* justify-content: center; */
        /* align-items: center; */
        margin-bottom: 0
    }
    .list-legend{
        display: flex;
        align-items: center;
    }
    .list-legend span{
        min-width: 5rem;
    }
    .leaflet-control-zoom-in,
    .leaflet-control-zoom-out {
        display: none !important;
    }
    .custom-label {
         /* background-color: rgba(255, 5, 5, 0); */
         width: auto; /* Lebar ikon kustom otomatis */
        text-align: center;
        font-size: 12px;
        line-height: 1.2;

    }
    #legenda hr{
        margin: 1rem 0;
        border-top: 1px solid black; 

    }
    .icon-img{
        width: 25px;
        height: 25px;
        position: static;

    }
    .nama-lokasi{
        color: white;
        widows: fit-content;
        white-space: nowrap;    /* Teks tidak akan pindah ke baris baru */
        overflow: hidden;       /* Mengatasi teks yang keluar dari batas */
        text-overflow: ellipsis;
        /* color: black; */
        text-shadow: 
        -1px -1px 0 #000, /* Garis luar kiri atas */
        1px -1px 0 #000, /* Garis luar kanan atas */
        -1px 1px 0 #000, /* Garis luar kiri bawah */
        1px 1px 0 #000; /* Garis luar kanan bawah */
        /* width: 100px; */
        /* background-color: blue */
    }
    .container-label{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;        
    }
    .list-content{
        margin-bottom: 0.5rem
    }
</style>
@endsection

@section('container')

<div class="relative bg-red-300 w-full flex flex-col items-center overflow-y-hidden pb-0 pt-20">
    
    {{-- <h4 class="bg-red-400">Halaman Potensi</h4> --}}
    <div class="flex potensi-nav h-20 w-full absolute z-50 px-5 pt-4 pr-10 " >
        <div class="no-print filter-container flex w-fit">

            <div class="pencarian-potensi flex" style="opacity: 100%">
                <button onclick="showAllLayer()" class="px-4 h-10 bg-white shadow-md border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none focus:bg-red-300">
                    Tampilkan semua layer
                </button>
            </div>
    
            <div class="pencarian-potensi flex ml-3" style="opacity: 100%">
                <select id="filterPotensi" onchange="filterPotensi()" class="pl-4 h-10 bg-white shadow-md border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="data-all-potention.json" selected>Potensi</option>
                    <option value="data-jagung.json">Jagung</option>
                    {{-- <option value="data-padi.json">Padi</option> --}}
                    <option value="sebaran-padi-1984.json">Padi</option>
                    <option value="data-ubi-kayu.json">Singkong</option>
                </select>
    
                {{-- <select name="potensi" id=""></select> --}}
    
            </div>
    
            <div class="filter-baru flex ml-3" style="opacity: 100%">
                <select id="filter-batas" onchange="batasDesaFilter()" class="pl-4 h-10 bg-white shadow-md border-gray-300 text-gray-900 text-sm rounded-full  block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{-- <option value="" selected>Perbatasan</option> --}}
                    <option value="dusun" selected>Batas Desa</option>
                    <option value="desa">Batas Dusun</option>
                    <option value="dataran">Batas Dataran</option>
                    <option value="jalan-sungai">Jalan & Sungai</option>
                    <option value="batas-kabupaten">Batas Kabupaten</option>
                </select>
    
                {{-- <select name="potensi" id=""></select> --}}
    
            </div>
    
            <div class="filter-lainnya flex ml-3" style="opacity: 100%">
                <select id="filter-lahan-lainnya" onchange="filterLainnya()" class="pl-4 h-10 bg-white shadow-md border-gray-300 text-gray-900 text-sm rounded-full  block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Lahan lainnya</option>
                    <option value="peternakan">Peternakan</option>
                    <option value="pertanian">Pertanian</option>
                    <option value="perkebunan">Perkebunan</option>
                    <option value="perumahan">Pemukiman</option>
                    <option value="kavling">Kavling</option>
                    <option value="lapangan">Lapangan</option>
                    <option value="danau">Danau</option>
                    <option value="usaha" class="pb-2 mb-2">Usaha</option>
                </select>
    
                {{-- <select name="potensi" id=""></select> --}}
    
            </div>
        </div>


        <div id="legenda" class="p-3 absolute bg-white w-fit h-fit right-0 z-60 mr-3 rounded-md pb-2" style="min-width: 20rem">
            <h1 class="text-xl font-bold text-center">LEGENDA</h1><hr>
            <img src="assets/img/skripsi/map/kompas.png" class="w-20 mx-auto" alt="">
            <div class="font-bold text-center text-md mt-2">Peta <span id="header-legend"></span> <br>Desa Benteng Gajah <br>Kec. Tompobulu, Kab. Maros</div><hr>
            {{-- <h2 class="font-bold text-center text-md mt-0">Desa Benteng Gajah</h2> --}}
            <div id="dynamic-legenda" class="dynamic-legenda">

            </div>
            <div id="static-legenda" class="content-legenda grid grid-rows-6 grid-flow-col gap-2">
                <div class="list-content flex">
                    <div class="w-5 h-5 bg-red-200 mr-1" style="background-color: #a75e2f"></div>
                    <span> : Peternakan</span>
                </div>
                <div class="list-content flex">
                    <div class="w-5 h-5 bg-red-200 mr-1" style="background-color: #ffda2d"></div>
                    <span> : Pertanian</span>
                </div>
                <div class="list-content flex">
                    <div class="w-5 h-5 bg-red-200 mr-1" style="background-color: #bdf787"></div>
                    <span> : Perkebunan</span>
                </div>
                <div class="list-content flex">
                    <div class="w-5 h-5 bg-red-200 mr-1" style="background-color: #dba37d"></div>
                    <span> : Pemukiman</span>
                </div>
                <div class="list-content flex">
                    <div class="w-5 h-5 bg-red-200 mr-1" style="background-color: #9900cc"></div>
                    <span> : Kavling</span>
                </div>
                <div class="list-content flex">
                    <div class="w-5 h-5 bg-red-200 mr-1" style="background-color: #32cd32"></div>
                    <span> : Lapangan</span>
                </div>
                <div class="list-content flex">
                    <div class="w-5 h-5 bg-red-200 mr-1" style="background-color: #20b2aa"></div>
                    <span> : Danau</span>
                </div>
                <div class="list-content flex">
                    <div class="w-5 h-5 bg-red-200 mr-1" style="background-color: #926e68"></div>
                    <span> : Usaha</span>
                </div>
                <div class="list-content flex">
                    <div class="w-5 h-5 bg-red-200 mr-1" style="background-color: red"></div>
                    <span> : Jagung</span>
                </div>
                <div class="list-content flex">
                    <div class="w-5 h-5 bg-red-200 mr-1" style="background-color: yellow"></div>
                    <span> : Padi</span>
                </div>
                <div class="list-content flex">
                    <div class="w-5 h-5 bg-red-200 mr-1" style="background-color: cyan"></div>
                    <span> : Singkong</span>
                </div>
               
            </div>
            <hr>
            <p class="text-xs italic font-bold text-center">Source & Validation</p>
            <p class="text-xs italic text-center">BBP Tompobulu & Kantor Desa Benteng Gajah</p>
        </div>
    </div>

    
    <div id="map" class="z-0 drop-shadow-md overflow-y-hidden mb-0">
        
    </div>

    <button id="cetak-pemetaan" class="no-print absolute bottom-5 left-12 z-60  px-3 h-10 bg-white shadow-md border-gray-300 text-gray-900 text-sm rounded-full w-24" onclick="window.print()">Cetak</button>
</div>

<script src="assets/js/testing/pemetaan.js"></script>
<script type="text/javascript">
    navbar = document.querySelector('.my-navbar');
    function bgBlack(){
        navbar.classList.add('bg-gray-900')
    }

    bgBlack()

    function highlight(){

        list = document.querySelector('.pemetaan').classList.add('current-list-item');
    }
    highlight()
</script>

@endsection