@extends('skripsi.sidebar')


@section('content')

<div class="" style="">
    {{-- ==== TABLE ==== --}}
    
    {{-- ===== BUTTON TAMBAH DATA ===== --}}
    
    <div class="mb-2">

        {{-- ===== MODAL ===== --}}
        
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
                            
                            <form class="grid grid-cols-2 gap-4" action="{{ route('tambahkan-data-potensi-baru') }}" method="post" enctype="multipart/form-data">
                                
                                @csrf
                                <div class="bg-red-200 h-fit pb-0" style="height: fit-content ; margin-bottom: 0px !important ; margin-top: 0">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Potensi</label>
                                    <input type="text" name="potensi" id="potensi" class="mb-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Kantor Desa" required>
                                </div>

                                <div class="bg-red-200 h-fit pb-0" style="height: fit-content ; margin-bottom: 0px !important ; margin-top: 0">
                                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Luas Lahan</label>
                                    <input type="number" name="luas-lahan" id="luas-lahan" class="mb-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Kantor Desa" required style="width: 100%">
                                </div>
                                                            
                                <div class="bg-gray-200">
                                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pemilik</label>
                                    <input type="text" name="pemilik" id="pemilik" placeholder="-5.148780610050018, 119.63453074432192" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                </div>

                                <div class="bg-blue-200">
                                    <label for="dusun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dusun</label>
                                    <select id="dusun" name="dusun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                      <option value="Balocci" selected>Dusun Balocci</option>
                                      <option value="Harapan">Dusun Harapan</option>
                                      <option value="Polewali">Dusun Polewali</option>
                                      <option value="Sakeang">Dusun Sakeang</option>
                                    </select>
                                </div>

                                
                                {{-- <div class="col-span-2">
                                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File JSON</label>

                                    <input type="file" name="JSON-file" id="json"  class="rounded"  required>
                                    <span class="text-xs">Masukkan format file yang benar (JSON)<span class="text-red-600">*</span></span>
                                </div> --}}
                                
                                <button type="submit" class="w-full col-span-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambahkan Data</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div> 

        {{-- ===== MODAL ===== --}}
        
    </div>
    {{-- ===== END OF BUTTON TAMBAH DATA ===== --}}


    <div class="relative  sm:rounded-lg ">
        <div class="flex items-center w-full justify-between pb-4  dark:bg-gray-900">
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
                            kelompok tani
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dusun
                        </th>
                        
                        <th scope="col" class="px-4 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $no = 1
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
                           
                            <td class="pl-2 pr-0 py-4 flex justify-center">
                                 
                                <a onclick="getOldData({{ $data['id'] }})" data-modal-target="edit-data-modal-potensi" data-modal-toggle="edit-data-modal-potensi" class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-white bg-yellow-400 px-3 py-1 ml-4 rounded-full" >Edit</a>
                                <a class="ml-3 font-medium text-blue-600 dark:text-blue-500 hover:underline text-white bg-red-700 px-3 py-1 rounded-full" >Delete</a>

                            </td>

                        </tr>
                    @endforeach
                    
                </tbody>
            </table>

{{-- ===== MODAL EDIT DATA ===== --}}
            <div id="edit-data-modal-potensi" class="fixed hidden mt-10 top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-data-modal-potensi">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">

                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Lengkapi data dibawah !!</h3>
                            
                            <form class="grid grid-cols-2 gap-4" action="{{ route('update-data-potensi') }}" method="POST">
                                
                                @csrf
                                <div class="hidden bg-red-200 h-fit pb-0" style="height: fit-content ; margin-bottom: 0px !important ; margin-top: 0">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID</label>
                                    <input type="text" name="id" id="update-id" class="mb-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                </div>

                                <div class="bg-red-200 h-fit pb-0 col-span-1" style="height: fit-content ; margin-bottom: 0px !important ; margin-top: 0">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Potensi</label>
                                    <input type="text" name="potensi" id="update-potensi" class="mb-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                </div>

                                <div class="bg-blue-200">
                                    <label for="dusun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dusun</label>
                                    <select id="update-dusun" name="dusun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option class="option-update" value="Balocci">Dusun Balocci</option>
                                    <option class="option-update" value="Harapan">Dusun Harapan</option>
                                    <option class="option-update" value="Polewali">Dusun Polewali</option>
                                    <option class="option-update" value="Sakeang">Dusun Sakeang</option>
                                </div>

                                <div class="bg-green-200">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelompok Tani</label>
                                    <input type="text" name="pemilik" id="update-kelompok-tani" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                </div>

                                {{-- <div class="bg-green-200 col-span-2">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon Name</label>
                                    <input type="text" name="icon-name" id="update-icon-name" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                </div> --}}
                                
                                <div class="col-span-2  grid grid-cols-6 gap-4">
                                    <div class="bg-gray-200 " style="grid-column: span 6 !important">
                                        <label for="" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Luas</label>
                                        <input type="text" name="luas" id="update-luas" placeholder="" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                    </div>
                                    
                                    
                                </div>
                                
                                <button type="submit" class="w-full col-span-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan Perubahan</button>
                                
                                {{-- =========================== --}}
                                <div id="update-terpencet" class="hidden p-2 drop-shadow-md bg-blue-100 grid grid-cols-6 grid-flow-col gap-0" style="width: fit-content ; text-shadow: -10px -10px 5px black; z-index:60">

                                    <label for="" class="p-3 update-icon-dropdown flex justify-center items-cent er cursor-pointer hover:bg-orange-600" for="hospital" onclick="updateChangeColor(0)"><img src="assets/icons/hospital.svg" class="w-7 mx-auto" alt="" >
                                        <input id="update-hospital" class="update-radio-input " type="radio" value="hospital.svg" placeholder="radio" name="icon">
                                    </label>
                                    <label class="justify-center items-center update-icon-dropdown flex cursor-pointer hover:bg-orange-600" for="update-gedung-bendera" onclick="updateChangeColor(1)"><img src="assets/icons/building-flag-solid.svg" class="w-7" alt="" >
                                        <input id="update-gedung-bendera" class="update-radio-input " type="radio" value="building-flag-solid.svg" placeholder="radio" name="icon">
                                    </label>
                                    <label class="justify-center items-center update-icon-dropdown flex cursor-pointer hover:bg-orange-600" for="update-kantor-desa" onclick="updateChangeColor(2)"><img src="assets/icons/kantor-desa.svg" class="w-7" alt="" >
                                        <input id="update-kantor-desa" class="update-radio-input " type="radio" value="kantor-desa.svg" placeholder="radio" name="icon">
                                    </label>
                                    <label class="justify-center items-center update-icon-dropdown flex cursor-pointer hover:bg-orange-600" for="update-mountain" onclick="updateChangeColor(3)"><img src="assets/icons/mountain-solid.svg" class="w-7" alt="" >
                                        <input id="update-mountain" class="update-radio-input " type="radio" value="mountain-solid.svg" placeholder="radio" name="icon">
                                    </label>
                                </div>
                                {{-- =========================== --}}

                            </form>
                        </div>
                    </div>
                </div>
            </div>
{{-- ===== END OF MODAL EDIT DATA ===== --}}
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="assets/js/admin/potensi-admin.js"></script>
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
            selectedItem[3].classList.add('font-bold')
        }
        selected()
    </script>
@endsection