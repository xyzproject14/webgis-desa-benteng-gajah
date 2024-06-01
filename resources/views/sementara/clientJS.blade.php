@extends('../layouts/main')

@section('container')
    <div class="pembungkus p-3">
        <div class="bg-red-400 induk w-20 h-36 m-4 p-4 border-2">
            kenapa tidak ada bgnya
        </div>
        <div class="uhuy w-36 h-64 bg-red-700">pan</div>
    </div>
    <script>
        wdiv = document.querySelector('.induk').clientWidth
        hdiv = document.querySelector('.induk').clientHeight
        odiv = document.querySelector('.induk').offsetWidth
        o2div = document.querySelector('.induk').offsetHeight
        console.log('wdiv : ' + wdiv)
        console.log('hdiv : ' + hdiv)
        console.log('odiv : ' + odiv)
        console.log('odiv : ' + o2div)
    </script>
@endsection