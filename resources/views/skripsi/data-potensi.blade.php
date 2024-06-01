@extends('skripsi.sidebar-guest')


@section('style-content')
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
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>
<script type="text/javascript" src="../assets/js/jquery-ajax.js"></script>
@endsection

@section('content')
<div class="bg-gray-200 w-full pb-10 h-screen flex flex-col items-center">
    
    <h4 class="text-3xl mt-5 font-bold">DATA SEBARAN POTENSI LAHAN</h4>
    <h4 class="text-xl mb-3">Desa Benteng Gajah</h4>
        
        
    <div class="relative sm:rounded-lg  w-full px-10 pb-5">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Potensi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Luas Lahan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kelompok Tani
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Dusun
                    </th>                  
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($data as $data)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $no++ }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $data['potensi'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $data['luas_lahan'] }} Ha
                            </td>
                            <td class="px-6 py-4">
                                {{ $data['pemilik'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data['dusun'] }}
                            </td>                          
                            <td class="px-6 py-4 text-right text-center">
                                 
                                <a onclick="" data-modal-target="edit-data-modal" data-modal-toggle="edit-data-modal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-white bg-yellow-400 px-3 py-1 rounded-full" >Detail</a>

                            </td>
                        </tr>
                    @endforeach
                
            </tbody>
        </table>
    </div>

</div>

{{-- <script src="assets/js/maps/potensi.js"></script> --}}
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