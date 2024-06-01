@extends('skripsi.sidebar')


@section('content')

<div class="" style="">
    {{-- ==== TABLE ==== --}}
    <div class="relative  shadow-md sm:rounded-lg pb-3 ">
        <div class="flex pb-3 items-center w-full justify-between mb-2 dark:bg-gray-900">


            <div>

                {{-- ===== MODAL TAMBAH DATA BARU ===== --}}
                
                    <!-- Modal toggle -->
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                        Tambah data baru <i class="fa-solid fa-plus ml-1"></i> 
                    </button>
                    
                    <!-- Main modal -->
                    <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed hidden mt-10 top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Lengkapi data dibawah !!</h3>
                                    
                                    <form class="grid grid-cols-2 gap-4" action="{{ route('tambahkan-data-visit-baru') }}" method="post">
                                        
                                        @csrf
                                       
                                        
                                        <div class="bg-red-200 h-fit pb-0" style="height: fit-content ; margin-bottom: 0px !important ; margin-top: 0">
                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lokasi</label>
                                            <input type="text" name="lokasi" id="lokasi" class="mb-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Kantor Desa" required>
                                        </div>

                                        <div class="bg-blue-200">
                                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dusun</label>
                                            <select id="countries" name="dusun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                              <option value="Balocci" selected>Dusun Balocci</option>
                                              <option value="Harapan">Dusun Harapan</option>
                                              <option value="Polewali">Dusun Polewali</option>
                                              <option value="Sakeang">Dusun Sakeang</option>
                                            </select>
                                        </div>

                                        <div class="bg-green-200 col-span-2">
                                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Lokasi</label>
                                            <input type="text" name="type" id="type" placeholder="Pelayanan Masyarakat, Pendidikan dll" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                        </div>
                                        
                                        <div class="bg-gray-200">
                                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Latlang</label>
                                            <input type="text" name="latlang" id="latlang" placeholder="-5.148780610050018, 119.63453074432192" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                        </div>
                                        
                                        <div>
                                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon</label>

                                            <div id="pencetButton" class="px-2 inline-flex items-center text-gray-500 bg-white border cursor-pointer" data-dropdown-toggle='terpencet' style="height: 2.5rem">Pencet</div>
                                            {{-- </div> --}}
                                                <div id="terpencet" class="hidden bg-blue-200 grid grid-cols-3  gap-0" style="width: fit-content">
                                                    {{-- @foreach($visitData as $key => $data)
                                                        <label class="icon-dropdown flex cursor-pointer hover:bg-orange-600" for="{{ $data['icon_name'] }}" onclick="changeColor({{ $key }})"><img src="assets/icons/{{ $data['icon_name'] }}" class="w-7" alt="" >
                                                            <input id="{{ $data['icon_name'] }}" class="radio-input" type="radio" value="{{ $data['icon_name'] }}" placeholder="radio" name="icon"> ini data {{ $key }}
                                                        </label>
                                                    
                                                        @endforeach --}}
                                                    
                                                        <label class=" p-2 icon-dropdown flex cursor-pointer hover:bg-orange-600" for="default" onclick="changeColor(0)">
                                                            <img src="assets/icons/costumize/default.svg" class="w-7" alt="" >
                                                            <input id="default" class="radio-input hidden" type="radio" value="default.svg" placeholder="radio" name="icon">
                                                        </label>

                                                        <label class=" p-2 icon-dropdown flex cursor-pointer hover:bg-orange-600" for="kesehatan" onclick="changeColor(1)">
                                                            <img src="assets/icons/costumize/kesehatan.svg" class="w-7" alt="" >
                                                            <input id="kesehatan" class="radio-input hidden" type="radio" value="kesehatan.svg" placeholder="radio" name="icon">
                                                        </label>
                                                       
                                                        <label class=" p-2 icon-dropdown flex cursor-pointer hover:bg-orange-600" for="keamanan" onclick="changeColor(2)">
                                                            <img src="assets/icons/costumize/keamanan.svg" class="w-7" alt="" >
                                                            <input id="keamanan" class="radio-input hidden" type="radio" value="keamanan.svg" placeholder="radio" name="icon">
                                                        </label>

                                                        <label class=" p-2 icon-dropdown flex cursor-pointer hover:bg-orange-600" for="pelayanan" onclick="changeColor(3)">
                                                            <img src="assets/icons/costumize/pelayanan.svg" class="w-7" alt="" >
                                                            <input id="pelayanan" class="radio-input hidden" type="radio" value="pelayanan.svg" placeholder="radio" name="icon">
                                                        </label>

                                                        <label class=" p-2 icon-dropdown flex cursor-pointer hover:bg-orange-600" for="pendidikan" onclick="changeColor(4)">
                                                            <img src="assets/icons/costumize/pendidikan.svg" class="w-7" alt="" >
                                                            <input id="pendidikan" class="radio-input hidden" type="radio" value="pendidikan.svg" placeholder="radio" name="icon">
                                                        </label>

                                                        <label class=" p-2 icon-dropdown flex cursor-pointer hover:bg-orange-600" for="mesjid" onclick="changeColor(5)">
                                                            <img src="assets/icons/costumize/mesjid.svg" class="w-7" alt="" >
                                                            <input id="mesjid" class="radio-input hidden" type="radio" value="mesjid.svg" placeholder="radio" name="icon">
                                                        </label>

                                                        <label class=" p-2 icon-dropdown flex cursor-pointer hover:bg-orange-600" for="gereja" onclick="changeColor(6)">
                                                            <img src="assets/icons/costumize/gereja.svg" class="w-7" alt="" >
                                                            <input id="gereja" class="radio-input hidden" type="radio" value="gereja.svg" placeholder="radio" name="icon">
                                                        </label>

                                                        <label class=" p-2 icon-dropdown flex cursor-pointer hover:bg-orange-600" for="wisata" onclick="changeColor(7)">
                                                            <img src="assets/icons/costumize/wisata.svg" class="w-7" alt="" >
                                                            <input id="wisata" class="radio-input hidden" type="radio" value="wisata.svg" placeholder="radio" name="icon">
                                                        </label>

                                                        
                                                   
                                                </div>
                                        </div>
                                        
                                        <button type="submit" class="w-full col-span-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambahkan Data</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
  
                {{-- ===== MODAL ===== --}}
            </div>
            
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="table-search-users" class="block py-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    {{-- <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th> --}}
                    @php
                        $no = 1
                    @endphp
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lokasi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Dusun
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tipe
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Icon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        LatLong
                    </th>
                    <th scope="col" class="text-center px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($visitData as $key => $data)
                    
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    {{-- <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td> --}}
                    <td class="px-6 py-4">
                        {{ $no++ }}
                    </td>
                    
                    <td class="px-6 py-4">
                        <input type="int" value="{{ $data['id'] }}" class="hidden">
                        <input type="text" value="{{ $data['location'] }}" class="old-lokasi hidden">
                        {{ $data['location'] }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $data['dusun'] }}
                        <input type="text" value="{{ $data['dusun'] }}" class="old-dusun hidden">
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> {{ $data['type'] }}
                            <input type="text" value="{{ $data['type'] }}" class="old-type hidden">
                        </div>
                    </td>

                    <td class="px-6 py-4 text-center">
                        <img src="assets/icons/costumize/{{ $data['icon_name'] }}" class="w-6" alt="">
                    </td>

                    <td class="px-6 py-4">
                        {{ $data['latlang'] }}
                        <input type="text" value="{{ $data['latlang'] }}" class="old-latlang hidden">
                    </td>
                    
                    
                    <td class="px-6 py-4 flex">
                        <a onclick="getDataUpdate({{ $data['id'] }})" data-modal-target="edit-data-modal" data-modal-toggle="edit-data-modal" class="text-white bg-yellow-400 px-3 py-1 rounded-full font-medium text-blue-600 dark:text-blue-500 hover:underline" >Edit</a>
                        <a  data-modal-target="delete-data-modal-{{ $data['id'] }}" data-modal-toggle="delete-data-modal-{{ $data['id'] }}" class="text-white bg-red-700 px-3 py-1 rounded-full ml-3 font-medium text-blue-600 dark:text-blue-500 hover:underline" >Delete</a>

                         {{-- ===== MODAL DELETE ==== --}}
                         <div id="delete-data-modal-{{ $data['id'] }}" class=" fixed  hidden mt-10 top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <div class="relative py-4 px-8 bg-white rounded-lg shadow dark:bg-gray-700">


                                    <h4 class="text-center text-xl">Apakah anda yakin ingin menghapus data :</h4>
                                    <p class="text-center font-bold w-full mx-auto">{{ $data['location'] }}?</p>
                                    <div class="action flex justify-center mt-3">
                                        <form action="{{ route('delete-data-visit', $data['id']) }}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ya</button>
                                        </form>
                                        <button data-modal-hide="delete-data-modal-{{ $data['id'] }}" class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Tidak</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ===== END OF MODAL DELETE ==== --}}
                        
                    </td>
                </tr>

                @endforeach
                
                        {{-- ===== MODAL EDIT DATA ===== --}}
                                               <!-- Main modal -->
                                               <div id="edit-data-modal" tabindex="-1" aria-hidden="true" class=" fixed hidden mt-10 top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-md max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-data-modal">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                        <div class="px-6 py-6 lg:px-8">
                                                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Lengkapi data dibawah !!</h3>
                                                            
                                                            <form class="grid grid-cols-2 gap-4" action="{{ route('update-data-visit') }}" method="POST">
                                                                
                                                                @csrf
                                                                <div class="hidden bg-red-200 h-fit pb-0" style="height: fit-content ; margin-bottom: 0px !important ; margin-top: 0">
                                                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID</label>
                                                                    <input type="text" name="id" id="update-id" class="mb-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                                                </div>
                
                                                                <div class="bg-red-200 h-fit pb-0" style="height: fit-content ; margin-bottom: 0px !important ; margin-top: 0">
                                                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lokasi</label>
                                                                    <input type="text" name="lokasi" id="update-lokasi" class="mb-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                                                </div>
                
                                                                <div class="bg-blue-200">
                                                                    <label for="dusun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dusun</label>
                                                                    <select id="update-dusun" name="dusun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    <option class="option-update" value="Balocci">Dusun Balocci</option>
                                                                    <option class="option-update" value="Harapan">Dusun Harapan</option>
                                                                    <option class="option-update" value="Polewali">Dusun Polewali</option>
                                                                    <option class="option-update" value="Sakeang">Dusun Sakeang</option>
                                                                    </select>
                                                                </div>
                
                                                                <div class="bg-green-200 col-span-2">
                                                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Lokasi</label>
                                                                    <input type="text" name="type" id="update-type" placeholder="Pelayanan Masyarakat, Pendidikan dll" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                                                </div>
                
                                                                {{-- <div class="bg-green-200 col-span-2">
                                                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon Name</label>
                                                                    <input type="text" name="icon-name" id="update-icon-name" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                                                </div> --}}
                                                                
                                                                <div class="col-span-2  grid grid-cols-6 gap-4">
                                                                    <div class="bg-gray-200 col-span-5" style="grid-column: span 5 !important">
                                                                        <label for="" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Latlang</label>
                                                                        <input type="text" name="latlang" id="update-latlang" placeholder="-5.148780610050018, 119.63453074432192" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                                                    </div>
                                                                    
                                                                    <div>
                                                                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon</label>
                                                                        
                                                                        <div id="update-pencetButton" class="px-2 inline-flex items-center text-gray-500 bg-white border cursor-pointer" data-dropdown-toggle='update-terpencet' style="height: 2.5rem"><img id="update-icon" class="w-10 h-10 py-1 px-2" alt=""></div>
                                                                        {{-- </div> --}}
                                                                            
                                                                    </div>
                                                                </div>
                                                                
                                                                <button type="submit" class="w-full col-span-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan Perubahan</button>
                                                                
                                                                {{-- =========================== --}}
                                                                <div id="update-terpencet" class="hidden p-2 drop-shadow-md bg-blue-100 grid grid-cols-3 gap-0" style="width: fit-content ; text-shadow: -10px -10px 5px black; z-index:60">
                
                                                                    <label for="update-default" class="p-3 update-icon-dropdown flex justify-center items-cent er cursor-pointer hover:bg-orange-600"  onclick="updateChangeColor(0)">
                                                                        <img src="assets/icons/costumize/default.svg" class="w-7 mx-auto" alt="" >
                                                                        <input id="update-default" class="hidden update-radio-input " type="radio" value="default.svg" placeholder="radio" name="icon">
                                                                    </label>
                
                                                                    <label for="update-kesehatan" class="p-3 justify-center items-center update-icon-dropdown flex cursor-pointer hover:bg-orange-600" for="" onclick="updateChangeColor(1)">
                                                                        <img src="assets/icons/costumize/kesehatan.svg" class="w-7" alt="" >
                                                                        <input id="update-kesehatan" class="hidden update-radio-input " type="radio" value="kesehatan.svg" placeholder="radio" name="icon">
                                                                    </label>
                
                                                                    <label for="update-keamanan" class="p-3 justify-center items-center update-icon-dropdown flex cursor-pointer hover:bg-orange-600" onclick="updateChangeColor(2)">
                                                                        <img src="assets/icons/costumize/keamanan.svg" class="w-7" alt="" >
                                                                        <input id="update-keamanan" class="hidden update-radio-input " type="radio" value="keamanan.svg" placeholder="radio" name="icon">
                                                                    </label>
                
                                                                    <label  for="update-pelayanan" class="p-3 justify-center items-center update-icon-dropdown flex cursor-pointer hover:bg-orange-600" onclick="updateChangeColor(3)">
                                                                        <img src="assets/icons/costumize/pelayanan.svg" class="w-7" alt="" >
                                                                        <input id="update-pelayanan" class="hidden update-radio-input " type="radio" value="pelayanan.svg" placeholder="radio" name="icon">
                                                                    </label>                                            
                
                                                                    <label for="update-pendidikan" class="p-3 update-icon-dropdown flex justify-center items-cent er cursor-pointer hover:bg-orange-600" onclick="updateChangeColor(4)">
                                                                        <img src="assets/icons/costumize/pendidikan.svg" class="w-7 mx-auto" alt="" >
                                                                        <input id="update-pendidikan" class="hidden update-radio-input " type ="radio" value="pendidikan.svg" placeholder="radio" name="icon">
                                                                    </label>
                
                                                                    <label class="p-3 justify-center items-center update-icon-dropdown flex cursor-pointer hover:bg-orange-600" for="update-mesjid" onclick="updateChangeColor(5)">
                                                                        <img src="assets/icons/costumize/mesjid.svg" class="w-7" alt="" >
                                                                        <input id="update-mesjid" class="hidden update-radio-input " type="radio" value="mesjid.svg" placeholder="radio" name="icon">
                                                                    </label>
                
                                                                    <label class="p-3 justify-center items-center update-icon-dropdown flex cursor-pointer hover:bg-orange-600" for="update-gereja" onclick="updateChangeColor(6)">
                                                                        <img src="assets/icons/costumize/gereja.svg" class="w-7" alt="" >
                                                                        <input id="update-gereja" class="hidden update-radio-input " type="radio" value="gereja.svg" placeholder="radio" name="icon">
                                                                    </label>
                
                                                                    <label class="p-3 justify-center items-center  update-icon-dropdown flex cursor-pointer hover:bg-orange-600" for="update-wisata" onclick="updateChangeColor(7)">
                                                                        <img src="assets/icons/costumize/wisata.svg" class="w-7" alt="" >
                                                                        <input id="update-wisata" class="hidden update-radio-input " type="radio" value="wisata.svg" placeholder="radio" name="icon">
                                                                    </label>
                                                                </div>
                                                                {{-- =========================== --}}
                
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        {{-- ===== END MODAL EDIT DATA ===== --}}
                               
            </tbody>
        </table>
    </div>
    {{-- ==== TABLE ==== --}}

    
    

    {{-- <div class="testing-drop-down-button"> --}}
       
</div>
    
@endsection

@section('script')
    <script src="assets/js/admin/visit-admin.js"></script>
    <script type="text/javascript">
        navbar = document.querySelector('.my-navbar');
        function bgBlack(){
            navbar.classList.add('bg-gray-900')
        }

        bgBlack()


        selectedItem = document.getElementsByClassName('list');
        function selected(){
            for (var item of selectedItem) {
                item.classList.remove("font-bold");
            }
            selectedItem[2].classList.add('font-bold')
        }
        selected()
    </script>
@endsection