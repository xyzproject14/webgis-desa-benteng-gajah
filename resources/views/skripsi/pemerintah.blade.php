@extends('layouts.main')

@section('style')
<style>

    .pemerintah-desa{
        /* background-color: red; */
        /* margin-left: 0; */
        width: 100%;
        height: 100vh;
        margin-top: 5rem;
        /* top: 5rem; */
        background-repeat: no-repeat;
         
    }
    .lapisan{
        /* padding: 0 5rem; */
    }
    .profile{
        background-image: url('assets/img/skripsi/pemerintah/latar desa kecil hitam.png');
        background-size: cover;
        margin: 0;
        padding:0;
    }
</style>
@endsection

@section('container')

    <div class="profile relative pemerintah-desa mt-10" >
        {{-- <img src="{{ @asset('assets/img/skripsi/pemerintah/Latar desa kecil hitam.png') }}" alt=""> --}}

        <div class="absolute h-screen py-0 w-full mt-10 px-10 flex items-center top-0">

            <div class="pak-desa w-1/3 h-auto flex flex-col justify-center items-center">
                <img class="w-72" src="{{ @asset('assets/img/skripsi/pemerintah/def-profile.jpg') }}" alt="">
                <div class="w-80 h-[0.5rem] rounded-full my-bg"></div>
                <h4 class="font-bold text-lg mt-2 my-tx">Kepala Desa</h4>
                <p class="text-base text-light">Ahmad ilham B</p>
            </div>

            <div class="sejarah w-2/3 pl-5 pr-16 flex flex-col -mt-16">
                <h4 class="my-tx text-2xl font-bold mb-2">Sejarah Desa</h4>
                <p class="text-xl text-light text-justify leading-8">{{ $sejarah->value }}</p>
            </div>

        </div>

        

    </div>

    <div class="struktur bg-light px-10 py-5 flex flex-col items-center">
        <h1 class="text-2xl font-bold">VISI MISI <span class="my-tx"> DESA</span></h1>
        <div class="flex flex-col items-center gap-4">
            <div class="visi w-1/2 flex flex-col items-center mt-5">
                <h4 class="font-bold text-xl">Visi</h4>
                <p>{{ $visi->value }}</p>
            </div>
            <div class="misi w-1/2 flex flex-col items-center mt-4">
                <h4 class="font-bold text-xl">Misi</h4>
                <p>{{ $misi->value }}</p>
            </div>
        </div>
    </div>

    
    <div class="w-full relative pb-5 bg-light struktur-desa py-5 flex flex-col items-center">
            <h1 class="text-2xl font-bold mb-5">PERANGKAT <span class="my-tx">DESA</span></h1>
            <div class="flex gap-12">

            @foreach($perangkatDesa as $data)
                <div class="rounded-xl bg-white shadow-md w-80 pb-3">
                    <div class="rounded-t-xl w-full h-48 my-bg flex flex-col justify-center items-center">
                        <i class='fa-solid {{ $data->icon }} fa-5x mt-5'></i>
                        <p class="mt-1 font-bold">{{ $data->label }}</p>
                    </div>
                    <div class="px-4 py-2">
                        <p>{{ $data->description }}</p>                    
                        <button class="btn w-full mt-2"  style="color: rgba(242, 129, 35);" onclick="detail('{{ $data->label }}')" >Liat dong</button>                         
                    </div>
                </div>

            @endforeach
            </div>
            <div id="modal" class="hidden fixed flex w-full h-screen top-0 gap-8 justify-center items-center" style="background-color: rgba(0, 0, 0, 0.8); z-index: 999">
                    
            </div>
    </div>

    {{-- @section('script')
        <script src="{{ asset('assets/js/pemerintah.js') }}" type="text/javascript"></script>
    @endsection --}}
    <script type="text/javascript">
        navbar = document.querySelector('.my-navbar');
        function bgBlack(){
            navbar.classList.add('bg-gray-900')
        }
    
        bgBlack()

        function highlight(){ 
            list = document.querySelector('.pemerintah').classList.add('current-list-item');
        }
        highlight()

        
        
        let modal = document.getElementById('modal')
        let body = document.querySelector('body')
        let grid = document.createElement('div')    

        function detail(data){
            body.classList.add('overflow-hidden')
            console.log(body);
            
            
            modal.classList.remove('hidden')

            let perangkatDesa = ''
            if(data == 'Staff Inti'){
                perangkatDesa = 'staf inti'
                grid.classList.add('grid-cols-2')
                grid.classList.remove('grid-cols-4')

            }else if(data == 'Kepala Dusun'){
                perangkatDesa = 'Kepala Dusun'
                grid.classList.add('grid-cols-4')
            }else{
                perangkatDesa = 'staf'
                grid.classList.add('grid-cols-4')
            }
        
            let perangkat = []
            $(document).ready(function(){
                $.ajax({
                    
                    url: "{{ route('data pemerintah') }}",
                    type: "GET",
                    dataType: 'json',
                    success: function(response){

                        grid.classList.add('grid','gap-8', 'place-content-center',  'place-items-center')

                        for(item of response){

                            if(item.type == perangkatDesa){
                                let container = document.createElement('div')
                                container.classList.add('w-72', 'pb-3' ,'opacity-100', 'bg-white', 'rounded-xl', 'flex', 'flex-col', 'items-center')
                                // console.log(data.nama);
                                
                                let nama = document.createElement('p')
                                nama.classList.add('font-bold', 'text-2xl', 'mt-3')
                                let jabatan = document.createElement('span')
                                let img = document.createElement('img')
                                let coverImg = document.createElement('div')
                                coverImg.classList.add('w-full', 'h-56', 'object-cover')
                                img.classList.add('w-full', 'h-full', 'object-cover', 'rounded-t-xl')

                                img.setAttribute('src', `{{ @asset('assets/img/skripsi/pemerintah/staf/${item.image}') }}`)                               
                                
                                coverImg.appendChild(img)
        
                                nama.innerText = item.nama
                                jabatan.innerText = item.jabatan
                                
                                container.innerHTML = ''
                                container.append(coverImg, nama, jabatan)
                                // console.log(container);
                                grid.append(container)
                              
                                
                            }
                        }
                        
                        modal.append(grid)
                    }
                })
            })
        }            
           
        function closeModal(){
            modal.classList.add('hidden')
            modal.innerHTML = ''
            grid.innerHTML = ''
            body.classList.remove('overflow-hidden')
        }
        modal.addEventListener('click', function(){
            closeModal()
        })

    </script>
@endsection