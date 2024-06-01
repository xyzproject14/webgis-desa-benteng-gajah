@extends('skripsi.sidebar')

{{-- @section('style')
<style>
    
</style>
@endsection --}}

@section('content')

<div class="" style="">
    {{-- ==== TABLE ==== --}}
    <form class="relative  sm:rounded-lg " action="{{ route('update-pemerintah') }}" method="post">

        @csrf
        <div class="flex items-center w-full justify-between pb-4  dark:bg-gray-900">
            <div class="profile w-full pr-2">

                <h1>Profile Desa</h1>
                <p id="profile" class="font-bold text-xl">Sejarah Desa :</p>
                <textarea class="h-48 w-full mr-5" name="sejarah" style="width: 100%">{{ $sejarah->value }}</textarea>
            </div>
        </div>

        <hr>
        {{-- <div class="flex items-center w-full justify-between pb-4  dark:bg-gray-900">
            <div class="profile w-full pr-2">

                <h1>Visi Misi Desa</h1>
                <p class="font-bold text-xl">Visi Desa :</p>
                <textarea id="visi-desa" name="visi" class="h-48 w-full mr-5" style="width: 100%">{{ $visi->value }}</textarea>
                <p class="font-bold text-xl">Misi Desa :</p>
                <textarea id="visi-desa" name="misi" class="h-48 w-full mr-5" style="width: 100%">{{ $sejarah->value }}</textarea>
            </div>
            <hr>
        </div> --}}

        <hr>
        <div class="struktur-organisasi flex flex-col items-center w-full justify-between pb-4  dark:bg-gray-900">
            
            <h1 class="font-bold text-xl mt-2 mb-5">Struktur Desa</h1>
            <div class="pemimpin-desa flex mb-5">

                <div class="w-full pr-2">
                    <p class="font-bold">{{ $kepdes->jabatan }}</p>
                    <input type="text" name="kepdes" value="{{ $kepdes->nama }}">
                    <input type="file" class="w-56">
                </div>
                <div class="w-full pr-2">
                    <p class="font-bold">{{ $sekdes->jabatan }}</p>
                    <input type="text" name="sekdes" value="{{ $sekdes->nama }}">
                    <input type="file" class="w-56">
                </div>
            </div>

            <div class="staf-desa flex mb-3 pb-0">
                @for ($i = 0; $i < 4; $i++)
                <div class="w-full pr-2">
                    <p class="font-bold">{{ $staf[$i]->jabatan }} :</p>
                    <input type="text" name="kaurkasi_{{ $i }}" value="{{ $staf[$i]->nama }}">
                    <input type="file" class="w-56">
                </div>    
                @endfor
            </div>

            <div class="staf-desa flex mb-5">

                @for ($i = 4; $i < 8; $i++)
                <div class="w-full pr-2">
                    <p class="font-bold">{{ $staf[$i]->jabatan }} :</p>
                    <input type="text" name="staf_{{ $i }}" value="{{ $staf[$i]->nama }}">
                    <input type="file" class="w-56">
                </div>    
                @endfor
            </div>

            <div class="staf-desa flex mb-5">

                {{-- <div class="w-full pr-2">
                    <p class="font-bold">Kepala Dusun Balocci :</p>
                    <input type="text" value="">
                </div>
                <div class="w-full pr-2">
                    <p class="font-bold">Kepala Dusun Harapan:</p>
                    <input type="text" value="">
                </div>
                <div class="w-full pr-2">
                    <p class="font-bold">Kepala Dusun Polewali:</p>
                    <input type="text" value="">
                </div>
                <div class="w-full pr-2">
                    <p class="font-bold">Kepala Dusun Sakeang :</p>
                    <input type="text" value="">
                </div> --}}
                @foreach ($dusun as $dusun)
                    <div class="w-full pr-2">
                        <p class="font-bold">{{ $dusun->jabatan }} :</p>
                        <input type="text" value="{{ $dusun->nama }}">
                        <input type="file" class="w-56">
                    </div>    
                @endforeach
            </div>

            <button class="btn btn-active bg-[#f28123] text-white border-none mb-3 mt-2 hover:bg-slate-800" type="submit">Simpan Perubahan</button>

        </div>
    </form>
</div>
@endsection

@section('script')
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
            selectedItem[1].classList.add('font-bold')
        }
        selected()
    </script>
@endsection