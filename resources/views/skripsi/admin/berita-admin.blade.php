@extends('skripsi.sidebar')


@section('content')
    <h1>Ini halaman berita</h1>
    <form id="form-editor" action="{{ route('simpan-berita') }}" method="POST">
        @csrf
        <input type="text" name="author_id" value="{{ session()->get('admin_id') }}">
        <input type="text" value="{{ date('Y-m-d H:i') }}">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="category" placeholder="category">
        <input id="content" type="hidden" name="content">
        <trix-editor input="content"></trix-editor>
        <button class="btn btn-active bg-[#f28123] text-white border-none mb-3 mt-2 hover:bg-slate-800" type="submit">Submit</button>
    </form>
    </form>

    <script>

        // var form = document.getElementById('form-editor');

        // form.addEventListener('submit', function(event){
        //     event.preventDefault();

        //     var trixContent = document.querySelector("trix-editor").value;
    
        //     var xhr = new XMLHttpRequest();
        //     xhr.open("POST", "/simpan-berita", true);
        //     xhr.setRequestHeader('Content-Type', 'application/json');
        //     xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Ganti dengan cara Anda mendapatkan CSRF token di Laravel
        //     xhr.onreadystatechange = function() {
        //         if (xhr.readyState == 4 && xhr.status == 200) {
        //             console.log(xhr.responseText);
        //             // Handle response if needed
        //             // console.log('berhasil keknya');
                    
        //         }
        //     };
        //     xhr.send(JSON.stringify({ content: trixContent }));          
        // })
        // function submitForm() {
        // }
    </script>
@endsection