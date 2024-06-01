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
    
</style>
@yield('style-content')
@endsection


@section('container')
<div class="relative flex h-screen " style="padding-top: 5rem">
    <div class="fixed sidebar w-72 h-screen bg-white pt-8 shadow-md">
        <h4 class="ml-4">Dashboard Admin</h4>
        <ul id="list-sidebar" class="mt-5">
            <li class="list {{ request()->is('potensi') ? 'font-bold' : '' }}" ><a href="potensi"><i class="fa-solid fa-map-location"></i>Peta</a></li>
            <li class="list {{ request()->is('data-potensi') ? 'font-bold' : '' }}" ><a href="{{ route('data-potensi') }}"><i class="fa-solid fa-book-open-reader"></i> Data</a></li>
            {{-- <li class="list"><a href="{{ route('kelola-visit') }}"><i class="fa-solid fa-location-dot"></i> Visit</a></li>
            <li class="list"><a href=""><i class="fa-solid fa-map-location"></i> Potensi</a></li>
            <li class="list"><a href=""><i class="fa-solid fa-phone"></i> Contact Person</a></li> --}}
            {{-- <li><a href=""><i class="fa-solid fa-table-columns"></i> Home</a></li> --}}
        </ul>
    </div>
    <div class="relative w-full content-bar">
         @yield('content')
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    function activeList(index){
        const lists = document.getElementsByClassName('list');
        for(var list of lists){
            list.classList.remove('font-bold')
        }
        
        lists[index].classList.add('font-bold')
    }

</script>
@endsection

