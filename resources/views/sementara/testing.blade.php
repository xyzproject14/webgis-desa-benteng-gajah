<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>WebGIS dengan Leaflet</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  {{-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> --}}
  <script type="text/javascript" src="../assets/js/jquery-ajax.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
  <!-- Memuat Library Leaflet -->
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    /* #map {
      width: 100%;
      height: 90vh;
    } */

    .hidden-marker {
      display: none;
    }
  </style>
</head>
<body>
  <h1>filter data geojson dari properti</h1>

  <select name="filter-potensi" id="filter-potensi" onchange="filterPotensi()">
    <option value="Sakeang">Sakeang</option>
    <option value="Balocci">Balocci</option>
    <option value="Harapan">Harapan</option>
    <option value="Polewali">Polewali</option>
  </select>
  <div id="map"></div>
  <div id="my-container" class="parent">

  </div>
  <select id="select-item" onchange="daftar()">
    <option value="nama">daftar nama</option>
    <option value="kampung">daftar kampung</option>
    <option value="test">testing</option>
  </select>

  <input id="input-nama" type="text" placeholder="nama">
  <input id="input-prodi" type="text" placeholder="prodi">
  <button id="saveButton">save</button>
  <button id="loadButton">load</button><br>
  <h1>ini color bar</h1>
  <div class="w-10 h-10 bg-[#008000]"> hei</div>
  <script>

    const save = document.getElementById('saveButton')
    const load = document.getElementById('loadButton')
    const nama = document.getElementById('input-nama')
    const prodi = document.getElementById('input-prodi')

    save.addEventListener('click', function(){
      // const data = {username: "ell", prodi: "ilmu komputer"}
      let oldData = JSON.parse(localStorage.getItem('dataStaf'))

      if(oldData == null){
        let newData = {nama: nama.value, prodi: prodi.value}
        localStorage.setItem('dataStaf', JSON.stringify(newData));
        console.log('data kosong');
        
      }else{
        let newData = {username: nama.value, prodi: prodi.value}

        let arrayData = []
        console.log(arrayData);

        arrayData = oldData;

        console.log(newData);
        console.log(oldData);
        console.log(arrayData);

        arrayData.push(newData)

        console.log(oldData);

        localStorage.setItem('dataStaf', JSON.stringify(arrayData));
        console.log('berhasil disimpan');

      }
      
    })

    load.addEventListener('click', function(){
      const dataLoaded = localStorage.getItem('userData');
      if(dataLoaded){
        const parseData = JSON.parse(dataLoaded)
        console.log(parseData);
      }else{
        console.log('data tidak ditemukan');
        
      }
      
    })
    // var map = L.map('map').setView([-6.1754, 106.8272], 13);
    // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    // // Data marker dan konten popup
    // var markers = [
    //   {lat: -6.1754, lng: 106.8272, popupContent: "<b>Lokasi 1</b><br>Ini adalah popup untuk lokasi pertama."},
    //   {lat: -6.1824, lng: 106.8278, popupContent: "<b>Lokasi 2</b><br>Ini adalah popup untuk lokasi kedua."},
    //   // Tambahkan data popup lainnya di sini
    // ];

    // // Perulangan untuk membuat popup tanpa marker
    // for (var i = 0; i < markers.length; i++) {
    //   var popup = L.popup({ closeButton: false, autoClose: false })
    //     .setLatLng([markers[i].lat, markers[i].lng])
    //     .setContent(markers[i].popupContent)
    //     .openOn(map);
    // }
  </script>
   <script src="assets/js/maps/testing.js"></script>
   {{-- <script src="assets/js/testing/readwrite.js"></script>
    --}}
</body>
</html>
