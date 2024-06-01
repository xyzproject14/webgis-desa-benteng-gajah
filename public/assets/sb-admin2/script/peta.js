var map = L.map("map", {
    center: [-5.13215855404893, 119.48598335249591],
    zoom: 15,
});

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

var marker = L.marker([-5.131864, 119.485918]).addTo(map);
marker.bindPopup("<b>Science Building FMIPA Unhas</b><br>Fakultas guwe nih");

var markerKost = L.marker([-5.129042, 119.489029]).addTo(map);
markerKost.bindPopup("<b>Kostnya Ell</b><br>Ramsis Unit 1 blok A no 210");
// var circle = L.circle([51.508, -0.11], {
//     color: "red",
//     fillColor: "#f03",
//     fillOpacity: 0.5,
//     radius: 500,
// }).addTo(map);
// var polygon = L.polygon([
//     [51.509, -0.08],
//     [51.503, -0.06],
//     [51.51, -0.047],
// ]).addTo(map);

// marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
// circle.bindPopup("I am a circle.");
// polygon.bindPopup("I am a polygon.");

var popup = L.popup()
    .setLatLng([-5.132, 119.485])
    .setContent("Aku pop up yang tidak jelas.")
    .openOn(map);

// function onMapClick(e) {
//     alert("You clicked the map at " + e.latlng);
// }

// map.on("click", onMapClick);

var popup = L.popup();

function onMapClick(e) {
    popup.setLatLng(e.latlng).setContent(e.latlng.toString()).openOn(map);
}

map.on("click", onMapClick);
