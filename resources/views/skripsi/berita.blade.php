@extends('layouts.main')

@section('style')
    <style>
        .news{
            margin-top: 5rem;
            /* margin-left: 0; */
            /* width: 100%; */
            /* height: 90vh; */
            /* top: 5rem; */
            /* background-repeat: no-repeat     */
        }
        .berita-kantor-desa::-webkit-scrollbar {
            display: none;
        }
        .my-shadow{
            box-shadow: 0px 2px 5px rgba(0,0,0,0.4);
        }
        .overlay{
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 100%);
            pointer-events: none;
        }
    </style>
@endsection

@section('container')

<div class="relative flex flex-col left-0 items-center mx-auto bg-light pb-5">

    
    <div class="flex w-full mt-20">
        
        <div class="berita-kiri w-3/4 flex flex-col mt-36">
            <div class="berita-nav top-20 my-shadow fixed w-3/4 bg-light flex-col flex justify-center items-center">
                <h1 class="text-black font-bold text-2xl mt-3 mb-3">BERITA <span class="my-tx">TERKINI</span></h1>
                <input class="w-96 px-3 rounded-full mb-4 bg-white" type="text" placeholder="Cari berita kesukaan anda">
            </div>
            <div class="w-full px-3">

                <div class="content-berita w-full p-3 hero h-[30rem] my-shadow mt-3 rounded-xl">
                    <div class="w-full h-[28rem]">
                        <img 
                        src="{{ @asset('assets/img/skripsi/berita/sepeda besar.jpg') }}"
                        alt=""
                        class="w-full h-full object-cover rounded-lg"
                        >
                    </div>
                </div>
            </div>

            <div class="berita-umum flex justify-between px-3 pt-4 flex-wrap gap-y-6">

                @foreach($berita as $data)
                <div class="gap-2 w-[49%] my-shadow flex rounded-2xl h-60 hover:cursor-pointer p-2 bg-white justify-center items-center">
                    <div class="image rounded w-1/2 h-full">
                        <img class="rounded-xl h-full w-full object-cover" src="{{ @asset('assets/img/'.$data->img) }}" alt="petani bucin">
                    </div>
                    <div class="content p-2 w-1/2 h-full flex flex-col ">
                        <div class="judul">
                            <p class="text-2xl font-semibold line-clamp-3">{{ $data->title }}</p>
                        </div>
                        <div class="my-2 h-auto max-h-[7.5rem] overflow-hidden">
                            <p class="text-base leading-6 overflow-hidden whitespace-normal line-clamp-2">
                                {{ $data->content }}
                            </p>
                        </div>
                        <div class=" flex gap-2 mt-auto">
                            <div class="w-9 h-9">
                                <img class="w-full h-full object-cover rounded-full" src="{{ asset('assets/img/skripsi/user/'. $data->author->profile_photo_path) }}" alt="">
                            </div>
                            <div class="flex flex-col pb-1 profile-img text-xs justify-center">
                                <span class="author font-bold">{{ $data->author->username }}</span>
                                <span class="date text-2xs">{{ $data->created_at->format('d F Y') }}</span>
                            </div>

                    
            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <div class="fixed berita-kanan w-1/4 h-screen flex flex-col items-center right-0">
            <div class="font-bold pt-2 my-shadow w-full flex flex-col items-center text-xl justify-center bg-dark text-light h-[10.5rem]">Berita dari <br><p class="text-orange-500 ml-1 text-2xl font-bold"> Kantor Desa</p></div>
            <div class="berita-kantor-desa px-3 pt-3 w-full overflow-y-auto h-full scrollbar-hidden pb-36">
                @for($i = 0; $i < 3 ; $i++)
                    <div class="card-berita-desa my-shadow w-full h-64 rounded-2xl right-auto mb-3 relative">
                        <img class="h-full w-full object-cover rounded-xl" src="{{ @asset('assets/img/petani bucin.jpg') }}" alt="">
                        <div class="overlay absolute bottom-0 right-0 w-full rounded-xl h-3/4">
                            <p class="absolute text-light bottom-0 px-3 pb-2 line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab molestias aperiam cumque a ut pariatur eaque laudantium recusandae officia fugiat?</p>
                        </div>
                    </div>
                @endfor
            </div>           
        </div>

    </div>
    

</div>

<script type="text/javascript">
    navbar = document.querySelector('.my-navbar');
    function bgBlack(){
        navbar.classList.add('bg-gray-900')
    }

    bgBlack()

    function highlight(){ 
        list = document.querySelector('.berita').classList.add('current-list-item');
    }
    highlight()

</script>
@endsection