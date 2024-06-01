@extends('layouts.main')

@section('style')
<style>
    #list-sidebar li{
        /* margin-bottom: 2rem; */
        padding:  1rem 0;
        font-size: 1rem;
        border-bottom: 1px solid #dcdcdc;
        padding-left: 1.2rem
    }
    #list-sidebar li a{
        width: kas;
        height: max-content;
        /* background-color: red */
    }
    #list-sidebar li:hover{
        background-color: #dcdcdc
    }
    #list-sidebar i{
        margin-right: 0.5rem
    }
    .content-bar{
        margin-left: 18rem
    }
    .bg-oranges{
        background-color: gray
    }
    .icon-dropdown:hover, .update-icon-dropdown:hover{
        background-color: gray;
    }
    u hr{
        margin-top: 0;
        margin-bottom: 0
    }
    .struktur-organisasi .w-full{
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }
</style>

@endsection


@section('container')
<div class="relative flex h-screen " style="padding-top: 5rem">
    <div class="fixed sidebar w-72 h-screen bg-white pt-8">
        <h2 class="ml-4 mb-0 font-bold text-2xl">Dashboard Admin</h2>
        <h4 class="ml-4">Admin : {{ session()->get('admin_name') }}</h4>

        <ul id="list-sidebar" class="mt-5">
            
            <li class="list"><a href="{{ route('kelola-home') }} " id="kelola-home"><i class="fa-solid fa-table-columns"></i> Home</a></li>
            <li class="list"><a href="{{ route('kelola-pemerintah') }}"><i class="fa-solid fa-book-open-reader"></i> Pemerintahan</a></li>
            <li class="list"><a href="{{ route('kelola-visit') }}"><i class="fa-solid fa-location-dot"></i>  Peta</a></li>
            <li class="list"><a href="{{ route('kelola-berita') }}"><i class="fa-solid fa-newspaper"></i>  Berita</a></li>
            <li class="list hidden"><a href="{{ route('kelola-potensi') }}"><i class="fa-solid fa-map-location"></i> Potensi</a></li>
            {{-- <li class="list"><a href="{{ route('kelola-contact') }}"><i class="fa-solid fa-phone"></i> Contact Person</a></li> --}}
            {{-- <li><a href=""><i class="fa-solid fa-table-columns"></i> Home</a></li> --}}
            @if(session()->has('superadmin'))
            <li class="list" onclick=""><a href="{{ route('kelola-admin') }}"><i class="fa-solid fa-user"></i> Admins</a></li>
            @endif
        </ul>
    </div>
    <div class="relative w-full content-bar px-4 pt-6 bg-slate-100 h-fit">
        @if(isset($title_admin))
            <h3 class="font-bold text-xl mb-3">{{ $title_admin }}</h3>
        @endif
        
        @yield('content')
    </div>
</div>
<script type="text/javascript">

</script>
@endsection



