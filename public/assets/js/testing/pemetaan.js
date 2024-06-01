// ==== VARIABELS ====
var batasDusun, pemetaan1984, filteredLayer;
var containerLegenda = document.getElementById("static-legenda");

latlang = "-5.158766244802736, 119.63731386474026";
arrlatlang = latlang.split(",");

// setting the map
var map = L.map("map").setView([arrlatlang[0], arrlatlang[1]], 14);

var baseLayers = {
    tileLayer: L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 19,
        attribution:
            '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }).addTo(map),
    // ===== TILE LAYER =====
    Esri_WorldImagery: L.tileLayer(
        "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}",
        {
            attribution:
                "Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community",
        }
    ).addTo(map),

    batas_dusun: batasDusun,
};

var filterValue = "dusun";
batasDesaFilter();

// ===== TAMPILAN AWAL SEMUA LAYER =====
function allLayer() {
    fetch("assets/dataGeojson/data potensi/data-pemetaan2.json")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            filteredLayer = L.geoJSON(data, {
                style: function (feature) {
                    var featureColor = feature.properties.color;
                    return {
                        opacity: 1,
                        color: "white",
                        fillOpacity: 0.3,
                        fillColor: featureColor,
                    };
                },

                onEachFeature: function (feature, layer) {
                    var jenis = feature.properties.ket;
                    var nama = feature.properties.nama;
                    if (nama == " ") {
                        nama = "undefined";
                    }
                    var dusun = feature.properties.dusun;

                    layer.bindPopup(
                        "<b>Jenis Lahan : </b>" +
                            jenis +
                            "<br>" +
                            "<b>Pemilik : </b>" +
                            nama +
                            "<br>dusun " +
                            dusun
                    );
                },
            }).addTo(map);
            // filteredLayer.bringToBack();
        });
}
// ===== END OF TAMPILAN AWAL SEMUA LAYER =====

// ===== MENAMPILKAN SEMUA POTENSI YANG ADA  =====
function allPotention() {
    fetch("assets/dataGeojson/data potensi/all-potention.json")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            filteredLayer = L.geoJSON(data, {
                style: function (feature) {
                    var featureColor = feature.properties.color;
                    return {
                        opacity: 1,
                        color: featureColor,
                        fillOpacity: 0.3,
                        fillColor: featureColor,
                    };
                },
                onEachFeature: function (feature, layer) {
                    var pemilik = feature.properties.Klpk_tn;
                    var dusun = feature.properties.dusun;

                    layer.bindPopup(
                        "<b>Kelompok Tani : </b>" +
                            pemilik +
                            "<br>" +
                            "<b>Dusun : </b>" +
                            dusun
                    );
                },
            }).addTo(map);
        });
}
// ===== END OF MENAMPILKAN SEMUA POTENSI YANG ADA  =====

function showAllLayer() {
    bersihkanLayer();
    tampilkanBatasDusun();
    allLayer();
    // allPotention();
    // perbatasan();

    containerLegenda.classList.remove("hidden");
    document.getElementById("dynamic-legenda").classList.add("hidden");
    map.flyTo([-5.158766244802736, 119.63731386474026], 14);
}
// showAllLayer();

function tampilanAwal() {
    perbatasan();
    containerLegenda.classList.add("hidden");

    // containerLegenda.classList.remove("hidden");
    map.flyTo([-5.158766244802736, 119.63731386474026], 14);
}
tampilanAwal();

function bersihkanLayer() {
    map.eachLayer(function (layer) {
        if (layer !== baseLayers["Esri_WorldImagery"]) {
            map.removeLayer(layer);
        }
    });
    containerLegenda.classList.add("hidden");
    // tampilkanBatasDusun();
}

//===== TAMPILKAN DATARAN =====
function showDataran(params) {
    var opacity = params === "lapisan" ? 0 : 0.3;
    console.log(opacity);

    fetch("assets/dataGeojson/data potensi/data-dataran.json")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            var dataran = L.geoJSON(data, {
                style: function (feature) {
                    var color = feature.properties.color;

                    return {
                        opacity: 1,
                        color: "white",
                        fillColor: color,
                        fillOpacity: opacity,
                    };
                },
                onEachFeature: function (feature, layer) {
                    var jenisDataran = feature.properties.ket;
                    var luas = feature.properties.luas;
                    var dusun = feature.properties.dusun;
                    var coor = feature.properties.coor;
                    var ket = feature.properties.ket;

                    if (params !== "lapisan") {
                        var popup = L.marker([coor[0], coor[1]], {
                            icon: L.divIcon({ className: "empty-icon" }),
                            riseOnHover: true,
                        }).addTo(map);
                        popup
                            .bindTooltip(ket, {
                                offset: [-20, -20],
                                direction: "top",
                            })
                            .openTooltip();
                    }

                    layer.bindPopup(
                        "<b>" +
                            jenisDataran +
                            "</b>(" +
                            luas.toFixed(2) +
                            "Ha)" +
                            "<br>Dusun : " +
                            dusun
                    );

                    // layer.bindTooltip(jenisDataran).openTooltip();
                },
            }).addTo(map);

            if (params === "lapisan") {
                console.log("ini lapisan");
                dataran.bringToBack();
            } else {
                map.flyTo([-5.158766244802736, 119.63731386474026], 14);
                console.log("ini bukan lapisan");
                legendMaker("Dataran", data.features, "Sebaran ");
            }
        });
}
//===== END OF TAMPILKAN DATARAN =====

// ===== MAKE LEGEND =====
// console.log(header.innerText);

function legendMaker(title, data, pratitle) {
    var legenda = document.getElementById("legenda");
    var legendContainer = document.getElementById("dynamic-legenda");
    var header = document.getElementById("header-legend");

    legendContainer.classList.remove("hidden");
    legendContainer.innerHTML = "";
    header.innerHTML = pratitle + "<i>" + title.toUpperCase() + "</i>";

    var list = document.createElement("div");
    list.classList.add("content-legend");

    if (title == "hidden") {
        legenda.classList.add("hidden");
    } else if (title == "Semua Potensi") {
        var content =
            "<b>Keterangan : </b>" +
            "<table class='mt-1'>" +
            "<tr><td><div class='list-legend'><div class='color-bar bg-[#ffff00] mr-1 ml-1'></div> : Padi</div></td></tr>" +
            "<tr><td><div class='list-legend'><div class='color-bar bg-[#ff0000] mr-1 ml-1'></div> : Jagung</div></td></tr>" +
            "<tr><td><div class='list-legend'><div class='color-bar bg-[#00ffff] mr-1 ml-1'></div> : Singkong</div></td></tr>" +
            "<tr><td><div class='list-legend'><div class='color-bar bg-[#ff7f00] mr-1 ml-1'></div> : Jagung & Padi</div></td></tr>" +
            "<tr><td><div class='list-legend'><div class='color-bar bg-[#000080] mr-1 ml-1'></div> : Jagung & Singkong</div></td></tr>" +
            "</table>";

        list.innerHTML = content;

        legendContainer.appendChild(list);
    } else if (pratitle == "Batas ") {
        var content;
        if (title == "Dusun") {
            content =
                "<table class='mt-1'>" +
                "<tr><td><div class='list-legend'><div class='color-bar bg-[#00ffff] mr-1 ml-1'></div> : Dusun Balocci</div></td><td><div class='list-legend ml-3'><div class='color-bar bg-[#800080] mr-1 ml-1'></div> : Kab. Gowa</div></td></tr>" +
                "<tr><td><div class='list-legend'><div class='color-bar bg-[#32cd32] mr-1 ml-1'></div> : Dusun Harapan</div></td><td><div class='list-legend ml-3'><div class='color-bar bg-[#d30000] mr-1 ml-1'></div> : Kec. Tanralili</div></td></tr>" +
                "<tr><td><div class='list-legend'><div class='color-bar bg-[#ffff00] mr-1 ml-1'></div> : Dusun Polewali</div></td><td><div class='list-legend ml-3'><div class='color-bar bg-[#ff7f00] mr-1 ml-1'></div> : Desa Puncak</div></td></tr>" +
                "<tr><td><div class='list-legend'><div class='color-bar bg-[#ff1493] mr-1 ml-1'></div> : Dusun Sakeang</div></td></tr></table>" +
                "<b class='mt-2'>Perbatasan Desa Benteng Gajah : </b>" +
                "<table class='mt-1'>" +
                "<tr><td><b>Utara</b></td><td>: Desa Puncak</td></tr>" +
                "<tr><td><b>Timur</b></td><td>: Desa Puncak & Kab. Gowa</td></tr>" +
                "<tr><td><b>Selatan</b></td><td>: Kab. Gowa</td></tr>" +
                "<tr><td><b>Barat</b></td><td>: Kec. Tanralili</td></tr>" +
                "</table>";
        } else if (title == "Desa") {
            content =
                "<table class='mt-1'>" +
                "<tr><td><div class='list-legend'><div class='color-bar bg-[#000080] mr-1 ml-1'></div> : Desa Benteng Gajah</div></td></tr>" +
                "<tr><td><div class='list-legend'><div class='color-bar bg-[#800080] mr-1 ml-1'></div> : Kab. Gowa</div></td></tr>" +
                "<tr><td><div class='list-legend'><div class='color-bar bg-[#d30000] mr-1 ml-1'></div> : Kec. Tanralili</div></td></tr>" +
                "<tr><td><div class='list-legend'><div class='color-bar bg-[#ff7f00] mr-1 ml-1'></div> : Desa Puncak</div></td></tr></table>" +
                "<b class='mt-2'>Perbatasan Desa Benteng Gajah : </b>" +
                "<table class='mt-1'>" +
                "<tr><td><b>Utara</b></td><td>: Desa Puncak</td></tr>" +
                "<tr><td><b>Timur</b></td><td>: Desa Puncak & Kab. Gowa</td></tr>" +
                "<tr><td><b>Selatan</b></td><td>: Kab. Gowa</td></tr>" +
                "<tr><td><b>Barat</b></td><td>: Kec. Tanralili</td></tr>" +
                "</table>";
        }
        list.innerHTML = content;

        legendContainer.appendChild(list);
    } else if (title == "jalan & sungai") {
        var content =
            "<b>Keterangan : </b>" +
            "<table class='mt-1'>" +
            "<tr><td><div class='list-legend'><div class='color-line bg-[#ffff00] mr-1 ml-1'></div> : Jalan Kabupaten</div></td></tr>" +
            "<tr><td><div class='list-legend'><div class='color-line bg-[#b9a271] mr-1 ml-1'></div> : Jalan Desa</div></td></tr>" +
            "<tr><td><div class='list-legend'><div class='color-line bg-[#64c2c1] mr-1 ml-1'></div> : Sungai</div></td></tr>" +
            "<tr><td><div class='list-legend'><div class='color-line  white-line bg-[#ffffff] mr-1 ml-1'></div> : Batas Desa & Dusun</div></td></tr>" +
            "<b class='mt-2'>Perbatasan Desa Benteng Gajah : </b>" +
            "<table class='mt-1'>" +
            "<tr><td><b>Utara</b></td><td>: Desa Puncak</td></tr>" +
            "<tr><td><b>Timur</b></td><td>: Desa Puncak & Kab. Gowa</td></tr>" +
            "<tr><td><b>Selatan</b></td><td>: Kab. Gowa</td></tr>" +
            "<tr><td><b>Barat</b></td><td>: Kec. Tanralili</td></tr>" +
            "</table>";

        list.innerHTML = content;

        legendContainer.appendChild(list);
    } else if (title == "Dataran") {
        var content =
            "<b>Keterangan : </b>" +
            "<table class='mt-1'>" +
            "<tr><td><div class='list-legend'><div class='color-bar bg-[#FFFF00] mr-1 ml-1'></div> : Dataran Tinggi (687,22 Ha)</div></td></tr>" +
            "<tr><td><div class='list-legend'><div class='color-bar bg-[#00ff00] mr-1 ml-1'></div> : Dataran Rendah (443,12 Ha)</div></td></tr>" +
            "</table";

        list.innerHTML = content;

        legendContainer.appendChild(list);
    } else {
        var totalLuas = 0;
        var totalLahan = 0;
        var color;
        data.forEach(function (item) {
            luas = item.properties.luas;
            color = item.properties.color;
            totalLuas = totalLuas + luas;
            ++totalLahan;

            // console.log();
        });

        var content =
            "<table>" +
            "<tr><td>Color</td><td><div class='list-legend'>: <div class='color-bar bg-[" +
            color +
            "] mr-1 ml-1'></div>" +
            title +
            "</div></td></tr>" +
            "<tr><td>Total Luas </td><td>: " +
            totalLuas.toFixed(3) +
            " Hektar</div></td></tr>" +
            "<tr><td>Total Lahan </td><td>: " +
            totalLahan +
            " Lahan</div></td></tr>" +
            "</table>";
        list.innerHTML = content;

        legendContainer.appendChild(list);
    }
    // console.log(data[0]);
    // legendContainer.innerHTML = "list";
    // console.log(totalLuas.toFixed(2));
}

// ===== END OF MAKE LEGEND =====

// ===== FILTER LAHAN LAINNYA =====
function filterLainnya() {
    var selectedLahanLainnya = document.getElementById("filter-lahan-lainnya");
    var valueLainnya = selectedLahanLainnya.value;
    fetch("assets/dataGeojson/data potensi/data-pemetaan2.json")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            var dataFilter = data.features.filter(function (feature) {
                return feature.properties.ket === valueLainnya;
            });

            var filterShow = {
                type: "FeatureCollection",
                features: dataFilter,
            };

            legendMaker(valueLainnya, dataFilter, "Sebaran Lahan ");
            bersihkanLayer();
            filteredLayer = L.geoJSON(filterShow, {
                style: function (feature) {
                    var featureColor = feature.properties.color;
                    return {
                        opacity: 0.5,
                        color: "yellow",
                        fillColor: featureColor,
                        fillOpacity: 0.5,
                    };
                },
                onEachFeature: function (feature, layer) {
                    var jenis = feature.properties.ket;
                    var nama = feature.properties.nama;

                    if (nama == " ") {
                        nama = "undefined";
                    }
                    var dusun = feature.properties.dusun;
                    var fid = feature.properties.FID;
                    var luas = feature.properties.luas;

                    layer.bindPopup(
                        fid +
                            "<br><b>Jenis Lahan : </b>" +
                            jenis +
                            "(" +
                            luas.toFixed(2) +
                            "Ha)" +
                            "<br>" +
                            "<b>Pemilik : </b>" +
                            nama +
                            "<br><b>dusun : </b>" +
                            dusun
                    );
                },
            }).addTo(map);

            var dataMarkers = data.flyTo[valueLainnya].titik;

            if (dataMarkers) {
                console.log("ada data");

                dataMarkers.forEach(function (coor, index) {
                    var marker = L.marker(coor[1])
                        .addTo(map)
                        .bindTooltip(coor[0], {
                            offset: [-16, -16],
                            direction: "top",
                        })
                        .openTooltip();
                });
            } else {
                console.log("tidak ada data");
            }

            var flyData = data.flyTo[valueLainnya];
            console.log(valueLainnya);

            map.flyTo([flyData.coor[0], flyData.coor[1]], flyData.zoom);
            // console.log(dataFilter);
            showDataran("lapisan");
        });

    // console.log(valueLainnya);
}
// ===== END OF LAHAN LAINNYA =====

function convertPotensi(params) {
    if (params == "sebaran-padi-1984.json") {
        return "Padi";
    } else if (params == "data-jagung.json") {
        return "Jagung";
    } else if (params == "data-ubi-kayu.json") {
        return "Singkong";
    } else {
        return "Semua Potensi";
    }
}

// ===== FILTER POTENSI =====
var showPotensi;
function filterPotensi() {
    var selectedPotensi = document.getElementById("filterPotensi");
    var potensiValue = selectedPotensi.value;

    fetch("assets/dataGeojson/data potensi/" + potensiValue)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            var jenis = data.jenis;

            var title = convertPotensi(potensiValue);

            legendMaker(title, data.features, "Sebaran Lahan Potensi ");
            bersihkanLayer();
            tampilkanBatasDusun("lapisan");

            showPotensi = L.geoJSON(data, {
                style: function (feature) {
                    var featureColor = feature.properties.color;
                    return {
                        opacity: 1,
                        fillColor: featureColor,
                        color: "yellow",
                        fillOpacity: 0.4,
                    };
                },
                onEachFeature: function (feature, layer) {
                    var nama = feature.properties.Klpk_tn;
                    var dusun = feature.properties.dusun;
                    var luas = feature.properties.luas;
                    console.log("ini properties : " + feature.properties.luas);

                    layer.bindPopup(
                        "<b>Jenis Lahan : </b>" +
                            jenis +
                            "(" +
                            luas.toFixed(3) +
                            "Ha)" +
                            "<br>" +
                            "<b>Kelompok Tani : </b>" +
                            nama +
                            "<br><b>dusun : </b>" +
                            dusun
                    );
                },
            }).addTo(map);

            map.flyTo([data.lat, data.lang], 15);
        });
}
// ===== END OF FILTER POTENSI =====

//  ===== TAMPILKAN BATAS BATAS DESA =====
// var layer_batas;
// function batasFilter() {
//     var selectedBatasFilter = document.getElementById("filter-batas");
//     var filterValue = selectedBatasFilter.value;

//     console.log(filterValue);
//     fetch("assets/dataGeojson/data/" + filterValue + ".json")
//         .then(function (response) {
//             return response.json();
//         })
//         .then(function (data) {
//             bersihkanLayer();
//             if (layer_batas) {
//                 map.removeLayer(layer_batas);
//             }
//             layer_batas = L.geoJSON(data, {
//                 style: function (feature) {
//                     return {
//                         // dashArray: "5, 10",
//                         opacity: 1,
//                         color: "red",
//                         fillOpacity: 0,
//                     };
//                 },
//             }).addTo(map);

//             layer_batas.bringToBack();
//             map.flyTo([data.lat, data.lang], data.zoom);
//         });
// }
// ===== END OF TAMPILKAN BATAS BATAS DESA =====

// ===== FILTER BATAS DSSA =====

function batasDesaFilter() {
    var selectedBatasFilter = document.getElementById("filter-batas");
    var filterValue = selectedBatasFilter.value;

    if (filterValue == "batas-kabupaten") {
        console.log("ini batas kabupaten");
        fetch("assets/dataGeojson/batasDesa/data-sebaran-kabupaten.json")
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                console.log(data);

                bersihkanLayer();
                // putri
                var dataran = L.geoJSON(data, {
                    style: function (feature) {
                        var color = feature.properties.color;

                        return {
                            opacity: 1,
                            color: "white",
                            fillColor: "red",
                            fillOpacity: 0.6,
                            weight:1
                        };
                    },
                }).addTo(map);
            });
    } else {
        fetch("assets/dataGeojson/data potensi/data-perbatasan.json")
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                bersihkanLayer();
                if (filterValue == "dataran") {
                    console.log("tydack terjadi apa apa");
                    showDataran();
                } else if (filterValue == "jalan-sungai") {
                    tampilkanBatasDusun("front");
                    sebaranJalan("back");
                    sebaranSungai();
                    legendMaker("jalan & sungai", data.features, "Sebaran ");
                    map.flyTo([-5.158738668537792, 119.63681675809839], 14);
                } else {
                    var dataFilter = data.features.filter(function (feature) {
                        return feature.properties.status !== filterValue;
                    });

                    if (filterValue == "dusun") {
                        legendMaker("Desa", data.features, "Batas ");
                        map.flyTo([-5.158738668537792, 119.63681675809839], 13);
                    } else {
                        map.flyTo([-5.158738668537792, 119.63681675809839], 14);
                        legendMaker("Dusun", data.features, "Batas ");
                    }

                    var newData = {
                        type: "FeatureCollection",
                        features: dataFilter,
                    };
                    fixedBatas = L.geoJSON(newData, {
                        style: function (feature) {
                            var color = feature.properties.color;
                            return {
                                opacity: 0.5,
                                color: "white",
                                fillColor: color,
                                fillOpacity: 0.3,
                            };
                        },
                        onEachFeature: function (feature, layer) {
                            var area = feature.properties.nama;
                            var kepdes = feature.properties.pemimpin;
                            var jabatan = feature.properties.jabatan;
                            var luas = feature.properties.LUAS;

                            layer.bindPopup(
                                "<b>Area : </b>" +
                                    area +
                                    "<br><b>" +
                                    jabatan +
                                    " : </b>" +
                                    kepdes +
                                    "<br><b>Luas : </b>" +
                                    luas.toFixed(3) +
                                    "Ha"
                            );

                            var coor = feature.properties.coor;
                            var nama = feature.properties.nama;
                            var jabatan = feature.properties.jabatan;
                            var pemimpin = feature.properties.pemimpin;
                            var luas = feature.properties.LUAS;

                            var marker = L.marker([coor[0], coor[1]]).addTo(
                                map
                            );
                            marker.bindTooltip(
                                "Rumah " + jabatan + ", " + nama,
                                {
                                    offset: [-20, -20],
                                    direction: "top",
                                }
                            );
                            marker.bindPopup(
                                nama +
                                    "<br>" +
                                    jabatan +
                                    " : " +
                                    pemimpin +
                                    "<br>Luas : " +
                                    luas.toFixed(3) +
                                    "Ha"
                            );
                        },
                    }).addTo(map);
                }

                // console.log(dataFilter);
            });
    }
}
// ===== END OF FILTER BATAS DESA =====

// ===== SEBARAN JALAN =====
function jalanPolygon() {
    fetch("assets/dataGeojson/data potensi/data-pemetaan2.json")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            var dataFilter = data.features.filter(function (feature) {
                return feature.properties.jenis == "jalan";
            });

            var filterShow = {
                type: "FeatureCollection",
                features: dataFilter,
            };

            filteredLayer = L.geoJSON(filterShow, {
                style: function (feature) {
                    var featureColor = feature.properties.color;
                    return {
                        opacity: 1,
                        color: featureColor,
                        fillColor: featureColor,
                        fillOpacity: 0.5,
                    };
                },
                onEachFeature: function (feature, layer) {
                    var jenis = feature.properties.ket;
                    var nama = feature.properties.nama;

                    if (nama == " ") {
                        nama = "undefined";
                    }
                    var dusun = feature.properties.dusun;
                    var fid = feature.properties.FID;
                    var luas = feature.properties.luas;

                    layer.bindPopup(
                        fid +
                            "<br><b>Jenis Lahan : </b>" +
                            jenis +
                            "(" +
                            luas.toFixed(2) +
                            "Ha)" +
                            "<br>" +
                            "<b>Pemilik : </b>" +
                            nama +
                            "<br>dusun " +
                            dusun
                    );
                },
            }).addTo(map);
        });
}
function sebaranJalan(position) {
    var indexJalan = 0;
    fetch("assets/dataGeojson/dataPolyline/data-jalan2.json")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            jalanPolygon();
            var sebaranJalan = L.geoJSON(data, {
                style: function (feature) {
                    var namaJln = feature.properties.NmJln;
                    if (namaJln == "Poros Batalyon") {
                        color = "yellow";
                    } else {
                        color = "#b9a271";
                    }

                    return {
                        color: color, // Warna garis jalan
                        weight: 8, // Lebar garis jalan
                        opacity: 1,
                        fillColor: "red",
                    };
                },
            }).addTo(map);

            sebaranJalan.eachLayer(function (layer) {
                // console.log(layer);

                var jalan = data["features"][indexJalan]["properties"];

                layer.bindPopup(
                    "<b>Jl." +
                        jalan["NmJln"] +
                        " (" +
                        jalan["Panjang"].toFixed(2) +
                        "km)</b>" +
                        "<br><span>Dusun " +
                        jalan["Dusun"] +
                        "<br>" +
                        "Jenis jalan : " +
                        jalan["jenis"] +
                        "</span>"
                );
                indexJalan++;
            });

            if (position) {
                if (position == "back") {
                    sebaranJalan.bringToBack();
                }
            }
        });
}
// ===== END OF SEBARAN JALAN =====

// ===== SEBARAN SUNGAI =====
function sebaranSungai() {
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

            sebaranJalan.bringToFront();
            sebaranJalan.eachLayer(function (layer) {
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
}
// ===== SEBARAN SUNGAI =====

// ===== TAMPILKAN DUSUN =====
function tampilkanBatasDusun(position) {
    fetch("assets/dataGeojson/batas-dusun.json")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            batasDusun = L.geoJSON(data, {
                style: function (feature) {
                    return {
                        // dashArray: "5, 10",
                        opacity: 1,
                        color: "white",
                        fillOpacity: 0,
                    };
                },

                onEachFeature: function (feature, layer) {
                    var nama = feature.properties.nama;
                    var luas = feature.properties.dusun;
                    var coor = feature.properties.coor;
                    // var potensi = data.features[indexData].potensi;
                    // indexData++;
                    var marker = L.marker([coor[0], coor[1]]);
                    marker.bindTooltip("ini adalah tooltip").openTooltip();
                    layer.bindPopup(
                        "<b>Dusun " +
                            nama +
                            "</b>" +
                            "<br>Luas : " +
                            luas +
                            " Ha"
                    );
                },
            }).addTo(map);

            if (position) {
                if (position == "front") {
                    batasDusun.bringToFront();
                }
            }
            batasDusun.bringToBack();
        });
}
// ===== END OF TAMPILKAN DUSUN =====

// // ===== TAMPILKAN PERBATASAN DESA =====
// function perbatasan() {
//     fetch("assets/dataGeojson/data potensi/data-perbatasan.json")
//         .then(function (response) {
//             return response.json();
//         })
//         .then(function (data) {
//             var dataFilter = data.features.filter(function (feature) {
//                 return feature.properties.status !== "dusun";
//             });

//             var newJson = {
//                 type: "FeatureCollection",
//                 features: dataFilter,
//             };
//             var perbatasan = L.geoJSON(newJson, {
//                 style: function (feature) {
//                     var color = feature.properties.color;
//                     return {
//                         opacity: 1,
//                         color: "white",
//                         fillOpacity: 0.3,
//                         fillColor: color,
//                     };
//                 },

//                 onEachFeature: function (feature, layer) {
//                     var data = feature.properties;
//                     var coor = feature.properties.coor;
//                     var nama = feature.properties.nama;

//                     layer.bindPopup("Area : " + data["nama"]);

//                     var marker = L.marker([coor[0], coor[1]], {
//                         icon: L.divIcon({ className: "empty-icon" }),
//                         riseOnHover: true,
//                     }).addTo(map);

//                     marker
//                         .bindTooltip(nama, {
//                             direction: "top",
//                         })
//                         .openTooltip();
//                 },
//             }).addTo(map);
//         });
// }
// // ===== END OF TAMPILKAN PERBATASAN DESA =====
