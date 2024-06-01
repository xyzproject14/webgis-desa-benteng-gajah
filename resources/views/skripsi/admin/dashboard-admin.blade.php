@extends('skripsi.sidebar')

@section('content')

<form action="{{ route('update-beranda') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>Slide 1</h1>
    <div class="flex pb-3">
        <div class="flex flex-col">
            <label class="font-bold" for="">Header</label>
            <input class="w-80" name="header1" type="text" value="{{ $data[0]->header }}">
            <label class="font-bold mt-2" for="">Subtitle</label>
            <input class="w-80" name="subtitle1" type="text" value="{{ $data[0]->span }}">
            <label class="font-bold mt-2" for="">Gambar</label>
            
            <input id="slide1-img-value" name="slide1-image" onchange="changeImage(slide1_image_prev)" class="w-80" type="file" value="{{ $data[0]->image }}">
            <input class="hidden" type="text" name="def-file-name1" value="{{ $data[0]->image }}">
        </div>
        <div class="img ml-10">
            <img id="slide1-image" class="w-fit h-44" src="{{ 'assets/img/skripsi/beranda/' . $data[0]->image }}" alt="">
        </div>
    </div>
    <hr>
    <h1>Slide 2</h1>
    <div class="flex pb-3">
        <div class="flex flex-col">
            <label class="font-bold" for="">Header</label>
            <input class="w-80" name="header2" type="text" value="{{ $data[1]->header }}">
            <label class="font-bold mt-2" for="">Subtitle</label>
            <input class="w-80" name="subtitle2" type="text" value="{{ $data[1]->span }}">
            <label class="font-bold mt-2" for="">Gambar</label>
            
            <input id="slide2-img-value" name="slide2-image" onchange="changeImage(slide2_image_prev)" class="w-80" type="file" value="{{ $data[1]->image }}">
            <input class="hidden" type="text" name="def-file-name2" value="{{ $data[1]->image }}">

        </div>
        <div class="img ml-10">
            <img id="slide2-image" class="w-fit h-44" src="{{ 'assets/img/skripsi/beranda/' . $data[1]->image }}" alt="">

        </div>
    </div>
    <hr>
    <h1>Slide 3</h1>
    <div class="flex pb-3">
        <div class="flex flex-col">
            <label class="font-bold" for="">Header</label>
            <input class="w-80" name="header3" type="text" value="{{ $data[2]->header }}">
            <label class="font-bold mt-2" for="">Subtitle</label>
            <input class="w-80" name="subtitle3" type="text" value="{{ $data[2]->span }}">
            <label class="font-bold mt-2" for="">Gambar</label>
            
            <input id="slide3-img-value" name="slide3-image" onchange="changeImage(slide3_image_prev)" class="w-80" type="file" value="{{ $data[2]->image }}">
            <input class="hidden" type="text" name="def-file-name3" value="{{ $data[2]->image }}">

        </div>
        <div class="img ml-10">
            <img id="slide3-image" class="w-56 h-44" src="{{ 'assets/img/skripsi/beranda/' . $data[2]->image }}" alt="">
        </div>
    </div>

    <button class="btn btn-active bg-[#f28123] text-white border-none mb-3 mt-2 hover:bg-slate-800" type="submit">Simpan Perubahan</button>

</form>
    
@endsection

@section('script')
    <script src="assets/js/admin/beranda-admin.js"></script>
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
            selectedItem[0].classList.add('font-bold')
        }
        selected()
    </script>
@endsection