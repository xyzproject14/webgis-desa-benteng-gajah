@extends('layouts.main')

@section('style')
<style>
    #map{
        height: 90vh;
        /* border-radius: 1rem; */
        width: 100%;
        /* margin-top: 2rem; */
        /* outline-style: solid;
        outline-color: white;
        outline-width: 0.5rem */
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
        color: black
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

{{-- LEAFLET --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>
<script src="https://unpkg.com/leaflet.label@0.2.4/dist/leaflet.label.js"></script>
{{-- LEAFLET --}}

<script type="text/javascript" src="../assets/js/jquery-ajax.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.0/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.0/dist/MarkerCluster.Default.css" />

@endsection

@section('container')
<div class="relative pt-20 bg-gray-100 min-h-screen flex flex-col items-center bg-gray-800">
    {{-- <input type="int" id="zoom-level"> --}}
    
    {{-- <form action="/search" method="get"> --}}
        
        <div id="error-message" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded w-fit left-16 absolute top-40 z-50" role="alert">
            <span class="block sm:inline">Data tidak ditemukan.</span>
        </div>
        <div class="absolute z-50 w-full top-20 pl-6 pt-6">
            {{-- <h3 class="font-bold">KUNJUNGI TEMPAT TEMPAT DI DESA KAMI</h3> --}}

            {{-- ERROR MESSAGE --}}
        {{-- ERROR MESSAGE --}}
            
            <div class="flex w-fit no-print">
                <div class="flex flex-col relative ">
                    <div class="relative z-20 w-96 rounded-full border-2 border-solid border-orange-400 mb-2">
                        
                        {{-- <datalist id="location-list">
                            <option value="ahay"></option>
                        </datalist> --}}
                        <input type="text" id="location-search" list="location-list"    name="search" autocomplete="off"  class="block pl-4 h-full w-full z-20 text-sm text-gray-900 bg-white focus:bg-white active:bg-white rounded-full border-l-gray-50 border-l-2 border border-gray-300 focus:ring-orange-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 rounded-l-lg" style="border-radius: 100px" placeholder="Kunjungi Desa Kami" required>

                        <button class="absolute rounded-full top-0 right-0 px-2.5 h-full text-sm font-medium text-white bg-blue-700  border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="background-color: rgb(234 88 12)"type="submit" onclick="searchData()">
    
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <span class="sr-only" ></span>
                        </button>
                        
                      
                            
                    </div>
                    <div id="search-result" class="hidden bg-white w-96 h-fit absolute z-10 rounded-3xl pt-5 pl-3  shadow">
                        
                        {{-- <p class="mb-2"><a href="/#">No data here</a></p>                        --}}
                    </div>
                    
                </div>
{{-- 
                <select name="quick-select" id="" class="px-4 rounded-full ml-3 border-none shadow-sm w-64">
                    <option selected>Quick Select</option>
                    <option value="Mesjid">Kantor desa</option>
                    <option value="Mesjid">Sekolah</option>
                    <option value="Mesjid">Kesehatan</option>
                    <option value="Mesjid">Mesjid</option>
                    <option value="Mesjid">Keamanan</option>
                </select> --}}

                <button onclick="quickSearch('all')" class="px-4 py-2.5 h-fit rounded-full ml-3 border-none shadow-sm bg-white">Semua</button>
                <button onclick="quickSearch('wisata')" class="px-4 py-2.5 h-fit rounded-full ml-3 border-none shadow-sm bg-white">Wisata</button>
                <button onclick="quickSearch('keamanan')" class="px-4 py-2.5 h-fit rounded-full ml-3 border-none shadow-sm bg-white">Keamanan</button>
                <button onclick="quickSearch('kesehatan')" class="px-4 py-2.5 h-fit rounded-full ml-3 border-none shadow-sm bg-white">Kesehatan</button>
                <button onclick="quickSearch('pelayanan masyarakat')" class="px-4 py-2.5 h-fit rounded-full ml-3 border-none shadow-sm bg-white">Pelayanan Masyarakat</button>

            </div>
            
{{-- ===== QUICK ACCESS ====== --}}

            <div id="quick-access" class="w-72 flex flex-col bg-white h-56 rounded absolute hidden">
                <div id="image-qa" class="h-48 w-full bg-red-100 rounded bg-cover" >
                    {{-- <img class="w-fit h-fit" src="assets/img/skripsi/gambar lokasi/bukit bahagia.png" alt=""> --}}
                </div>
                <div class="keterangan px-3 py-2">
                    <p id="location-qa" class="text-lg font-bold mb-0 leading-3">Kantor Desa</p>
                    <span id="type-qa" class=" text-sm">Pelayanan Masyarakat</span>
                </div>
                <div class="button flex h-12">
                    <div class="prev w-1/2 h-full flex justify-center items-center bg-gray-100 hover:bg-orange-300 cursor-pointer" onclick="prev_qa()"><</div>
                    <div class="next w-1/2 h-full flex justify-center items-center bg-gray-100 hover:bg-orange-300 cursor-pointer" onclick="next_qa()">></div>
                </div>
            </div>

{{-- ===== QUICK ACCESS ====== --}}


                {{-- <form action="/cariin" method="get">
                    <input type="search" placeholder="carikin">
                    <input type="submit" value="cari">
                </form> --}}
        </div>
    {{-- </form> --}}

        
    
        <div id="map" class="z-0 drop-shadow-md border-1">
            
        </div>
        <button id="cetak-pemetaan" class="no-print absolute bottom-5 left-12 z-60  px-3 h-10 bg-white shadow-md border-gray-300 text-gray-900 text-sm rounded-full w-24" onclick="window.print()">Cetak</button>

</div>
<script src="assets/js/search-visit.js"></script>
<script src="assets/js/maps/visit.js"></script>
<script type="text/javascript">
    navbar = document.querySelector('.my-navbar');
    function bgBlack(){
        navbar.classList.add('bg-gray-900')
    }

    bgBlack()

    function highlight(){

        list = document.querySelector('.visit').classList.add('current-list-item');
    }
    highlight()

    // let input = document.getElementById('location-search');
    // function searchData(){
    //     alert(input.value)
    // }
    
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>

@endsection

@section('script')
<script src="https://unpkg.com/leaflet.markercluster@1.5.0/dist/leaflet.markercluster.js"></script>

@endsection