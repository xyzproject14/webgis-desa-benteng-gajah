var map = L.map("map", {
    center: [-3.9105989466551616, 119.89028673053416],
    zoom: 15,
});

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 13,
    attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

var mSPBU = L.marker([-3.918888865120953, 119.91557984446095]).addTo(map);
mSPBU.bindPopup("<b>SPBU Pertamina</b>");
