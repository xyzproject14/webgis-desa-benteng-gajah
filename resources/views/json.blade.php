<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    
    <style>
        #map {
            height: 90vh;
            widows: 100%; 
        }
        </style>
        <script type="text/javascript" src="assets/js/jquery-ajax.js"></script>
</head>
<body>
    <h1>ini map</h1>
    <div id="map"></div>

    <script>
        var map = L.map('map').setView([-5.15739851323953, 119.63679882481034], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);


        // TESTING PARSING DATA BEDE
        $(document).ready(function(){
        $.getJSON('json', function(data){
            $.each(data, function(index){
                mentahan = data[index].latlang
                asli = mentahan.split(',');
                console.log(asli);
                
                L.marker([asli[0], asli[1]]).addTo(map)
            })
        })
    })

    </script>
</body>
</html>