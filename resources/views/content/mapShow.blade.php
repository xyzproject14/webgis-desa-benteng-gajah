@extends('../layouts/main')

@section('container')
    <h1>Ini maps</h1>
   <div id="map" class="w-full h-screen"></div>

   <script>
    var map = L.map('map').setView([-3.9103612425844783, 119.88958137693326], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


   </script>
@endsection