@extends('skripsi.sidebar')


@section('content')

<div class="" style="">


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
                            
                            <form class="grid grid-cols-2 gap-4" action="{{ route('tambahkan-data-contact-baru') }}" method="post" enctype="multipart/form-data">
                                
                                @csrf
                                <div class="bg-red-200 h-fit pb-0" style="height: fit-content ; margin-bottom: 0px !important ; margin-top: 0">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="nama" id="nama" class="mb-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Kantor Desa" required>
                                </div>

                                <div class="bg-red-200 h-fit pb-0" style="height: fit-content ; margin-bottom: 0px !important ; margin-top: 0">
                                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pelayanan</label>
                                    <input type="text" name="pelayanan" id="pelayanan" class="mb-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Kantor Desa" required>
                                </div>
                                                            
                                <div class="bg-gray-200 col-span-2 ">
                                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Whatsapp</label>
                                    <input type="text" name="whatsapp" id="latlang" placeholder="-5.148780610050018, 119.63453074432192" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                </div>
                                
                                <div class="col-span-2">
                                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto</label>

                                    <input type="file" name="foto" id="foto"  class="rounded"  required>
                                    <span class="text-xs">Sebaiknya gunakan resolusi foto 1 x 1 <span class="text-red-600">*</span></span>
                                </div>
                                
                                <button type="submit" class="w-full col-span-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambahkan Data</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div> 

        {{-- ===== MODAL ===== --}}
        
    </div>
    {{-- ===== END OF BUTTON TAMBAH DATA ===== --}}


    {{-- ==== TABLE ==== --}}
    <div class="relative  sm:rounded-lg">
        <div class="flex items-center w-full justify-between pb-4  dark:bg-gray-900">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pelayanan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Whatsapp
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>                       
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $contact)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $contact['nama'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $contact['pelayanan'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $contact['whatsapp'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $contact['image_url'] }}
                            </td>                           
                            <td class="px-6 py-4 flex justify-center">
                                
                                <a onclick="getOldData({{ $contact['id'] }})" data-modal-target="edit-data-modal-contact" data-modal-toggle="edit-data-modal-contact" class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-white bg-yellow-400 px-3 py-1 rounded-full" >Edit</a>
                                {{-- <a  data-modal-target="delete-data-modal-contact" data-modal-toggle="delete-data-modal-contact" class="ml-3 font-medium text-blue-600 dark:text-blue-500 hover:underline text-white bg-red-700 px-3 py-1 rounded-full" >Delete</a> --}}

                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>


{{-- ===== MODAL EDIT DATA ===== --}}
            <div id="edit-data-modal-contact" class="fixed hidden mt-10 top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-data-modal-contact">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">

                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Lengkapi data dibawah !!</h3>
                            
                            <form class="grid grid-cols-2 gap-4" action="{{ route('update-data-potensi') }}" method="POST">
                                
                                @csrf
                                <div class=" bg-red-200 h-fit pb-0" style="height: fit-content ; margin-bottom: 0px !important ; margin-top: 0">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID</label>
                                    <input type="text" name="update-id" id="update-id" class="mb-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                </div>

                                <div class="bg-red-200 h-fit pb-0 col-span-1" style="height: fit-content ; margin-bottom: 0px !important ; margin-top: 0">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="update-nama" id="update-nama" class="mb-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                </div>

                                <div class="bg-red-200 h-fit pb-0 col-span-1" style="height: fit-content ; margin-bottom: 0px !important ; margin-top: 0">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pelayanan</label>
                                    <input type="text" name="update-pelayanan" id="update-pelayanan" class="mb-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                </div>

                                <div class="bg-green-200">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Whatsapp</label>
                                    <input type="text" name="update-whatsapp" id="update-whatsapp" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                </div>

                                {{-- <div class="bg-green-200 col-span-2">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon Name</label>
                                    <input type="text" name="icon-name" id="update-icon-name" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                </div> --}}
                                
                                <div class="col-span-2  grid grid-cols-6 gap-4">
                                    <div class="bg-gray-200 " style="grid-column: span 6 !important">
                                        <label for="" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                                        <input type="file" name="update-image" id="update-image" placeholder="" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                    </div>
                                    
                                    
                                </div>
                                
                                <button type="submit" class="w-full col-span-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan Perubahan</button>
                                
                                {{-- =========================== --}}
                                
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
    <script src="assets/js/admin/contact-admin.js"></script>
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
            selectedItem[4].classList.add('font-bold')
        }
        selected()
    </script>
@endsection