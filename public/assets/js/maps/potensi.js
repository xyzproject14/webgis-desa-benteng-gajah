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

// ===== MENAMPILKAN KAB KOTA DI SULSEL =====
var kabkotasulsel;
fetch("assets/dataGeojson/data_testing/kab kota sulsel.json")
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        kabkotasulsel = L.geoJSON(data, {
            style: function (feature) {
                return {
                    // dashArray: "5, 10",
                    opacity: 1,
                    color: "yellow",
                    fillOpacity: 0,
                };
            },
        });
    });

// ===== MENAMPILKAN KAB KOTA DI SULSEL =====

// ===== MENAMPILKAN SEBARAN KECAMATAN DI KAB MAROS =====
var kabMaros;
fetch("assets/dataGeojson/data_testing/kecamatan kab maros.json")
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        kabMaros = L.geoJSON(data, {
            style: function (feature) {
                return {
                    opacity: 1,
                    color: "blue",
                    fillOpacity: 0,
                };
            },
        });
    });
// ===== MENAMPILKAN SEBARAN KECAMATAN DI KAB MAROS =====

// ===== MENAMPILKAN SEBARAN DESA DI KECAMATAN TOMPOBULU =====
var sebaranDesa;
fetch("assets/dataGeojson/data_testing/desa-kec-tompobulu.json")
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        sebaranDesa = L.geoJSON(data, {
            style: function (feature) {
                return {
                    // dashArray: "5, 10",
                    opacity: 1,
                    color: "red",
                    fillOpacity: 0,
                };
            },
        });

        // batasDusun.eachLayer(function (layer) {
        //     // console.log(layer);

        //     layer.bindPopup(data["features"][index]["properties"]["nama"]);
        //     index++;
        // });
    });
// ===== MENAMPILKAN SEBARAN DESA DI KECAMATAN TOMPOBULU =====

// // ===== MENAMPILKAN BATAS DESA =====
// var geoLayer;
// fetch("assets/dataGeojson/batas_desa.json")
//     .then(function (response) {
//         return response.json();
//     })
//     .then(function (data) {
//         geoLayer = L.geoJSON(data, {
//             style: function (feature) {
//                 return {
//                     opacity: 0.5,
//                     color: "red",
//                     fillOpacity: 0,
//                 };
//             },
//         }).addTo(map);

//         geoLayer.eachLayer(function (layer) {
//             layer.bindPopup(data["features"][0]["properties"]["name"]);
//         });

//         var polygons = data["features"][0]["geometry"]["coordinates"];
//         // console.log(koordinat[0]);
//         // console.log(koordinat[1]);
//         // var koordinat = [
//         //     [-5.12, 119.49],
//         //     [-5.12, 119.5],
//         //     [-5.11, 119.5],
//         //     // Tambahkan koordinat lainnya untuk membentuk polygon
//         // ];
//         polygons.forEach(function (polygonCoordinates) {
//             var polygon = L.polygon(polygonCoordinates);
//             var polygonGeoJSON = polygon.toGeoJSON();
//             var area = turf.area(polygonGeoJSON);
//             console.log("Luas Polygon:", area, "meter persegi");
//         });
//     });
// ===== MENAMPILKAN BATAS DESA =====

// ===== BATAS DUSUN =====
var batasDusun;
var index = 0;
fetch("assets/dataGeojson/batas-dusun.json")
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        batasDusun = L.geoJSON(data, {
            style: function (feature) {
                return {
                    dashArray: "5, 10",
                    opacity: 1,
                    color: "#c1d370",
                    fillOpacity: 0,
                };
            },
        }).addTo(map);

        batasDusun.eachLayer(function (layer) {
            // console.log(layer);

            layer.bindPopup(data["features"][index]["properties"]["nama"]);
            index++;
        });
    });
// ===== END OF BATAS DUSUN =====

// ===== SEBARAN JALAN =====
var indexJalan = 0;
fetch("assets/dataGeojson/dataPolyline/data-jalan.json")
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        var sebaranJalan = L.geoJSON(data, {
            style: function (feature) {
                var namaJln = feature.properties.NmJln;
                if (namaJln == "Poros Batalyon") {
                    color = "white";
                } else {
                    color = "#b9a271";
                }

                return {
                    color: color, // Warna garis jalan
                    weight: 8, // Lebar garis jalan
                    opacity: 1,
                };
            },
        }).addTo(map);

        sebaranJalan.bringToFront();
        sebaranJalan.eachLayer(function (layer) {
            // console.log(layer);

            var jalan = data["features"][indexJalan]["properties"];

            layer.bindPopup(
                "<b>Jl." +
                    jalan["NmJln"] +
                    " (" +
                    jalan["Panjang"] +
                    "km)</b>" +
                    "<br><span>Dusun " +
                    jalan["Dusun"] +
                    "<br>" +
                    jalan["jenis"] +
                    "</span>"
            );
            indexJalan++;
        });
    });
// ===== END OF SEBARAN JALAN =====

// ===== SEBARAN SUNGAI =====
var indexSungai = 0;
fetch("assets/dataGeojson/sebaran-sungai.json")
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        var sebaranJalan = L.geoJSON(data, {
            style: function (feature) {
                return {
                    color: "#64c2c1", // Warna garis jalan
                    weight: 3, // Lebar garis jalan
                    opacity: 0.7,
                };
            },
        }).addTo(map);

        sebaranJalan.eachLayer(function (layer) {
            console.log(layer);

            layer.bindPopup(
                "<b>Sungai Dusun " +
                    data["features"][indexSungai]["properties"]["Dusun"] +
                    "</b><br>Panjang : " +
                    data["features"][indexSungai]["properties"]["Panjang"] +
                    "km"
            );
            indexSungai++;
        });
    });
// ===== SEBARAN SUNGAI =====

// ===== MENAMPILKAN SEMUA TIITK =====
var markers = [];
// var markers2 = [];
$(document).ready(function () {
    $.getJSON("visit_data", function (data) {
        //    CONTROLING ZOOM
        var myIcon;
        $.each(data, function (index) {
            // console.log("ini data : " + data);
            if (data[index].icon_name) {
                myIcon = "assets/icons/costumize/" + data[index].icon_name;
            } else {
                myIcon = "assets/icons/costumize/default.svg";
            }

            datastr = data[index].latlang;
            dataArr = datastr.split(",");

            if (data[index].latlang) {
                var customLabel = L.divIcon({
                    className: "custom-label",
                    html:
                        "<div class='container-label'><img src='" +
                        myIcon +
                        "' class='icon-img'><span class='nama-lokasi'>" +
                        data[index].location +
                        "</span></div>",
                    zoomAnimation: false,
                });

                var marker = L.marker([dataArr[0], dataArr[1]], {
                    icon: customLabel,
                    myIcon,
                    title: "desa",
                })
                    .addTo(map)
                    .bindPopup(
                        "<b>" +
                            data[index].location +
                            "</b><br>" +
                            data[index].type +
                            "."
                    );

                markers.push(marker);
            }
        });
    });
});

// ===== FILTER POTENSI =====
var potensiLayer;
// var indexData = 0;
function filterPotensi() {
    if (potensiLayer) {
        map.removeLayer(potensiLayer);
    }

    var selected = document.getElementById("filterPotensi");
    var value = selected.value;
    console.log("ini value kamyu : " + value);

    fetch("assets/dataGeojson/data potensi/" + value)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            potensiLayer = L.geoJSON(data, {
                style: function (feature) {
                    var featureColor = feature.properties.color;
                    return {
                        opacity: 1,
                        color: "white",
                        fillColor: featureColor,
                        fillOpacity: 0.3,
                    };
                },
                onEachFeature: function (feature, layer) {
                    var klpk_tn = feature.properties.Klpk_tn;
                    var dusun = feature.properties.dusun;
                    // var potensi = data.features[indexData].potensi;
                    // indexData++;
                    layer.bindPopup(
                        "<b>Potensi : </b>" +
                            "<br>" +
                            klpk_tn +
                            "<b><br>dusun " +
                            dusun
                    );
                },
            }).addTo(map);

            if (value == "all-potention.json") {
                map.flyTo([data.features[0].lat, data.features[0].lang], 14);
            } else {
                map.flyTo([data.features[0].lat, data.features[0].lang], 15);
            }
        });
}

filterPotensi();

// ===== END OF FILTER POTENSI =====

// ====== FILTER BATAS =======
function newFilter() {
    // console.log(params);
    var selected = document.getElementById("filter-batas");
    var value = selected.value;

    if (value == "batas-kabupaten") {
        kabkotasulsel.addTo(map);
        map.removeLayer(kabMaros);
        map.removeLayer(sebaranDesa);
    } else if (value == "batas-kecamatan") {
        kabMaros.addTo(map);
        map.removeLayer(kabkotasulsel);
        map.removeLayer(sebaranDesa);
    } else if (value == "batas-desa") {
        sebaranDesa.addTo(map);
        map.removeLayer(kabkotasulsel);
        map.removeLayer(kabMaros);
    } else {
        map.removeLayer(sebaranDesa);
        map.removeLayer(kabkotasulsel);
        map.removeLayer(kabMaros);
    }

    // console.log(value);
}


