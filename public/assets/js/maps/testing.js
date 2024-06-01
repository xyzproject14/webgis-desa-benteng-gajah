latlang = "-5.158766244802736, 119.63731386474026";
arrlatlang = latlang.split(",");

// setting the map
var map = L.map("map").setView([arrlatlang[0], arrlatlang[1]], 14);
L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

// ===== TILE LAYER =====
var Esri_WorldImagery = L.tileLayer(
    "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}",
    {
        attribution:
            "Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community",
    }
);
Esri_WorldImagery.addTo(map);
// ===== END OF TILE LAYER =====

var batasDusun;
var index = 0;

var filteredLayer;
function filterPotensi() {
    var selected = document.getElementById("filter-potensi");
    var value = selected.value;

    fetch("assets/dataGeojson/batas-dusun.json")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            // console.log(data["features"][index]["properties"]["nama"]);
            console.log(filteredLayer);

            var filteredFeatures = data.features.filter(function (feature) {
                return feature.properties.nama === value;
            });

            // Membuat GeoJSON baru hanya dengan fitur yang telah difilter
            var filteredGeoJSON = {
                type: "FeatureCollection",
                features: filteredFeatures,
            };
            if (filteredLayer) {
                map.removeLayer(filteredLayer);
                console.log("ada layer nih");
            }
            // Membuat layer GeoJSON dan menambahkannya ke peta
            filteredLayer = L.geoJSON(filteredGeoJSON, {
                style: function (feature) {
                    var featureColor = feature.properties.color;
                    return {
                        opacity: 0.7,
                        color: featureColor,
                        fillColor: featureColor,
                        fillOpacity: 0.3,
                    };
                },
            }).addTo(map);
            // batasDusun.eachLayer(function (layer) {
            //     // console.log(layer);

            //     layer.bindPopup(data["features"][index]["properties"]["nama"]);
            //     index++;
            // });
        });
}

console.log("udah masuk bang");
var container = document.getElementById("my-container");
var mahasiswa = ["ilham", "ell", "ahmad"];
var kampung = ["wajo", "pinrang", "makassar"];
var fixData;

function daftar() {
    var select = document.getElementById("select-item");
    var value = select.value;
    console.log(value);
    fixData = [];
    container.innerHTML = "";

    if (value == "nama") {
        fixData = mahasiswa;
    } else if (value == "test") {
        var element = document.createElement("div");
        element.innerHTML = "<b>Test aja bang</b>";

        container.appendChild(element);
    } else {
        fixData = kampung;
    }

    fixData.forEach(function (item) {
        var list = document.createElement("li");
        list.textContent = item;
        container.appendChild(list);
    });
}
