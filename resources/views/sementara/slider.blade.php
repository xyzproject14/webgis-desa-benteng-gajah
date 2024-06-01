@extends('../layouts/latihan')

@section('latihan')
<div class="body w-full h-screen flex justify-center items-center">
    <div class="main-container">

        <h1 class="kepala">ini slider</h1>    
        <div class="row-slider">
            <div class="slider">
                <img class="" src="../assets/img/petani bucin.jpg" alt="">
            </div>
            <div class="slider">
                <img class="" src="../assets/img/petani bucin.jpg" alt="">
            </div>
            <div class="slider">
                <img class="" src="../assets/img/petani bucin.jpg" alt="">
            </div>
            
        </div>
        <div class="butt-grup flex">
            <div class="btn prev"><</div>
            <div class="btn next">></div>
        </div>
            
    </div>

</div>
{{-- <style>
    .sliders{
        w
    }
</style> --}}
@endsection