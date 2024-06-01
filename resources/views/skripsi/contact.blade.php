@extends('layouts.main')

@section('container')
    <div class="w-full h-screen pt-28 px-5">
        <h1 class="text-center font-bold text-3xl mb-5">CONTACT PERSON PELAYANAN DESA</h1>
        <div class="grid grid-cols-4 gap-4">
            
            @foreach($data as $contact)
            
                <div class="bg-white w-80 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 py-4">                
                    <div class="flex flex-col items-center py-2">
                        @if(isset($contact['image_url']))
                        <div class="w-20 h-20 overflow-hidden rounded-full">
                            <img class="w-full h-auto mb-3 rounded-full shadow" src="{{ asset('storage/img/contact/' . $contact['image_url']) }}" alt="Bonnie image"/>
                        </div>
                            
                        @else
                             <img class="w-20 h-24 mb-3 rounded-full shadow" src="assets/img/skripsi/pemerintah/def-profile.jpg" alt="Bonnie image"/>
                        @endif
                        
                        <h5 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">{{ $contact
                        ['nama'] }}</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $contact['pelayanan'] }}</span>
                        <div class="flex mt-2 space-x-3 md:mt-6">
                            <a href="https://wa.me/{{ $contact['whatsapp'] }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Whatsapp</a>
                            {{-- <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Detail</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
            

        </div>
    </div>

    <script type="text/javascript">
        navbar = document.querySelector('.my-navbar');
        function bgBlack(){
            navbar.classList.add('bg-gray-900')
        }
    
        bgBlack()

        function highlight(){

            list = document.querySelector('.contact').classList.add('current-list-item');
        }
        highlight()
    </script>
@endsection