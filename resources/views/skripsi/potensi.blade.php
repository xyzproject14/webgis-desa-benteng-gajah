@extends('skripsi.sidebar-guest')


@section('style-content')
{{-- <script src="assets/js/maps/truf.js"></script> --}}
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
</style>
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


@endsection

@section('content')
<div class="bg-red-300 w-full flex flex-col items-center overflow-y-hidden pb-0">
    
    {{-- <h4 class="bg-red-400">Halaman Potensi</h4> --}}
    <div class="flex potensi-nav h-20 w-full  absolute z-50 px-5 pt-4" >
        <div class="pencarian-potensi flex" style="opacity: 100%">
            <select id="filterPotensi" onchange="filterPotensi()" class="pl-4 h-10 bg-white shadow-md border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="all-potention.json" selected>Filter by potensi</option>
                <option value="data-jagung.json">Jagung</option>
                <option value="data-padi.json">Padi</option>
                <option value="sebaran-padi-1984.json">Padi 1984</option>
                <option value="data-ubi-kayu.json">Ubi Kayu</option>
            </select>

            {{-- <select name="potensi" id=""></select> --}}

        </div>

        <div class="filter-baru flex ml-4" style="opacity: 100%">
            <select id="filter-batas" onchange="newFilter()" class="pl-4 h-10 bg-white shadow-md border-gray-300 text-gray-900 text-sm rounded-full  block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="tidak-ada-batas" selected>Filter</option>
                <option value="batas-kabupaten">Batas Kabupaten</option>
                <option value="batas-kecamatan">Batas Kecamatan</option>
                <option value="batas-desa">Batas Desa</option>
            </select>

            {{-- <select name="potensi" id=""></select> --}}

        </div>
    </div>
    <div id="map" class="z-0 drop-shadow-md overflow-y-hidden mb-0">
        
    </div>
</div>
<script src="assets/js/maps/potensi.js"></script>
<script type="text/javascript">
        navbar = document.querySelector('.my-navbar');
        function bgBlack(){
            navbar.classList.add('bg-gray-900')
        }
    
        bgBlack()

        function highlight(){

            list = document.querySelector('.potensi').classList.add('current-list-item');
        }
        highlight()
        
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>



    {{-- konversi file --}}

@endsection