// ===== BATAS DESA BENTENG GAJAH =====
fetch("assets/dataGeojson/batas_desa.json")
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        geoLayer = L.geoJSON(data, {
            style: function (feature) {
                return {
                    opacity: 0.5,
                    color: "red",
                    fillOpacity: 0,
                };
            },
        }).addTo(map);

        geoLayer.eachLayer(function (layer) {
            layer.bindPopup(data["features"][0]["properties"]["name"]);
        });
    });

// ===== BATAS DESA BENTENG GAJAH =====

latlang = "-5.158253356190781, 119.63671301460194";
arrlatlang = latlang.split(",");

// setting the map
var map = L.map("map", { zoomControl: false }).setView(
    [arrlatlang[0], arrlatlang[1]],
    14
);
// var mapOptions = {
//     center: [arrlatlang[0], arrlatlang[1]],
//     zoom: 10.5,
// };

// var map = new L.map("map", mapOptions);

//  =============
L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

// Menampilkan titik lokasi dari database
// let inputZoom = document.getElementById("zoom-level");
// let mapid = document.getElementById("map");
// console.log("atas");
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
                        "' class='icon-img'>" +
                        // "<span class='nama-lokasi'>" +
                        // data[index].location +
                        // "</span>"+
                        "</div>",
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

function errorMessage() {
    errorFlash.classList.remove("hidden");
    setInterval(function () {
        errorFlash.classList.add("hidden");
    }, 2000);
}

let location2 = document.getElementById("location-search");
let errorFlash = document.getElementById("error-message");
var popups = [];

function searchData() {
    popups.forEach((element) => {
        element.remove();
    });
    popups = [];

    let latlangData = "";
    let dataPencarian = "data tidak ditemukan";
    $.getJSON("visit_data", function (data) {
        var statusData = false;
        $.each(data, function (index) {
            switch (location2.value.toLowerCase()) {
                case data[index]["location"].toLowerCase():
                    dataPencarian = data[index];
                    console.log("data ada sayang");
                    statusData = true;
            }
        });

        if (statusData == false) {
            errorFlash.classList.remove("hidden");
            setInterval(function () {
                errorFlash.classList.add("hidden");
            }, 2000);
        }
        // console.log(data);
        latlangData = dataPencarian["latlang"].split(",");
        // console.log(latlangData[0] + " dan " + latlangData[1]);

        map.flyTo([Number(latlangData[0]), Number(latlangData[1])], 17);
        var popup = L.popup([
            Number(latlangData[0]),
            Number(latlangData[1]),
        ]).addTo(map);
        popup
            .bindPopup(
                "<b>" +
                    dataPencarian["location"] +
                    "</b><br>" +
                    dataPencarian["type"]
            )
            .openPopup();
    });
}

// memberitahukan posisi klik kita
function onMapClick(e) {
    alert("You clicked the map at " + e.latlng);
}
map.on("click", onMapClick);

// ======== FITUR PENCARIAN CEPAT ==========
var image = document.getElementById("image-qa");
var lokasi = document.getElementById("location-qa");
var type = document.getElementById("type-qa");
var data_visit = [];
var data_urutan = 0;
var quick_access = document.getElementById("quick-access");

console.log("popups : " + popups);

function quickSearch(params) {
    if (params == "all") {
        searchResult.classList.add("hidden");
        quick_access.classList.add("hidden");
        popups.forEach((element) => {
            element.remove();
        });
        popups = [];
        console.log("popups : " + popups);

        map.flyTo([arrlatlang[0], arrlatlang[1]], 14);
    } else {
        searchResult.classList.add("hidden");
        popups.forEach((element) => {
            element.remove();
        });
        popups = [];
        $.getJSON("quick-search/" + params, function (data) {
            if (data == false) {
                console.log("data kosong mas");
                // location.innerHTML = "ahay";
            } else {
                quick_access.classList.remove("hidden");
                data_visit = [];
                $.each(data, function (index) {
                    dataLatlang = data[index].latlang;
                    latlang = dataLatlang.split(",");
                    console.log("in data location : " + data[index]);

                    // var data_tunggal = data[index];
                    // console.log("data tunggal : " + data_tunggal);

                    data_visit.push(data[index]);

                    // ======= QUICK ACCESS LOCATION =======
                    // lokasi.innerHTML = "ahay";
                    // ======= END OF QUICK ACCESS LOCATION =======
                    if (latlang[0]) {
                        var popup = L.popup()
                            .setLatLng([latlang[0], latlang[1]])
                            .setContent(
                                "<b>" +
                                    data[index].location +
                                    "</b><br>" +
                                    data[index].type +
                                    "."
                            );

                        popups.push(popup);
                        var fix_image = data_visit[index].img
                            ? data_visit[index].img
                            : "petani bucin.jpg";
                        image.setAttribute(
                            "style",
                            "background-image: url('assets/img/skripsi/gambar lokasi/" +
                                fix_image +
                                "')"
                        );
                    }

                    // map.flyTo([latlang[0], latlang[1]], 17);
                });

                var popupLayer = L.layerGroup(popups);
                popupLayer.addTo(map);

                if (popups.length > 0) {
                    var lastPopup = popups[popups.length - 1];
                    map.flyTo(lastPopup.getLatLng(), 17);
                }
            }
            // console.log("marker : " + marker);
            data_urutan = data_visit.length - 1;
            console.log("ini data visit kamu hay : " + data_visit[0]);
            console.log(data_visit[data_urutan].location);

            lokasi.innerHTML = data_visit[data_urutan].location;
            type.innerHTML = data_visit[data_urutan].type;

            console.log("panjang data visit : " + data_visit.length);

            // lokasi.innerHTML = "ell ganteng";
        });
    }
}

// ======= QUICK ACCESS LOCATION =======
function prev_qa() {
    if (data_urutan == 0) {
        data_urutan = data_visit.length;
    }

    lokasi.innerHTML = data_visit[data_urutan - 1].location;
    type.innerHTML = data_visit[data_urutan - 1].type;
    var visit_image = data_visit[data_urutan - 1].img;
    var fix_image = visit_image ? visit_image : "petani bucin.jpg";

    image.setAttribute(
        "style",
        "background-image: url('assets/img/skripsi/gambar lokasi/" +
            fix_image +
            "')"
    );
    // if (visit_image) {
    // } else {
    //     image.setAttribute(
    //         "style",
    //         "background-image: url('assets/img/petani bucin.jpg')"
    //     );
    // }

    var latlang = data_visit[data_urutan - 1].latlang;
    console.log("latlang : " + latlang);

    latlang = latlang.split(",");
    console.log("anj : " + latlang[0]);

    map.flyTo([latlang[0], latlang[1]], 17);
    data_urutan--;
}

function next_qa() {
    if (data_urutan == data_visit.length - 1) {
        data_urutan = -1;
    }
    lokasi.innerHTML = data_visit[data_urutan + 1].location;
    type.innerHTML = data_visit[data_urutan + 1].type;
    var visit_image = data_visit[data_urutan + 1].img;
    var fix_image = visit_image ? visit_image : "petani bucin.jpg";

    image.setAttribute(
        "style",
        "background-image: url('assets/img/skripsi/gambar lokasi/" +
            fix_image +
            "')"
    );

    var latlang = data_visit[data_urutan + 1].latlang;
    console.log("latlang : " + latlang);

    latlang = latlang.split(",");
    console.log("anj : " + latlang[0]);

    if (latlang[0]) {
        map.flyTo([latlang[0], latlang[1]], 17);
    }
    data_urutan++;
}
// ======= END OF QUICK ACCESS LOCATION =======

// ======== END OF FITUR PENCARIAN CEPAT ==========

function testing() {
    alert("halo for revenge");
}

// ===== FITUR AUTO COMPLETE SEARCH =====
var searchResult = document.getElementById("search-result");
location2.addEventListener("focus", function () {
    console.log("search on focus");
    searchResult.classList.toggle("hidden");
    quick_access.classList.add("hidden");
});
// ===== END OF FITUR AUTO COMPLETE SEARCH =====

// ===== AUTO COMPLETE PENCARIAN =====
var hasilPencarian = document.getElementById("hasil-pencarian");

var dataLokasi;
$(document).ready(function () {
    $.getJSON("hasil-pencarian", function (data) {
        // console.log(data);
        dataLokasi = data;
    });
});

const suggestionList = document.createElement("ul");
suggestionList.className = "suggestion";
const inputPencarian = document.getElementById("location-search");

location2.addEventListener("input", function () {
    const inputValue = inputPencarian.value.toLowerCase();
    const filteredData = dataLokasi.filter((item) =>
        item.toLowerCase().includes(inputValue)
    );

    displaySuggestion(filteredData);
});

const searchResult2 = document.getElementById("search-result");
function displaySuggestion(data) {
    while (suggestionList.firstChild) {
        suggestionList.removeChild(suggestionList.firstChild);
    }

    data.forEach((item) => {
        const listItem = document.createElement("li");
        listItem.textContent = item;
        suggestionList.appendChild(listItem);
    });

    searchResult2.appendChild(suggestionList);
}

suggestionList.addEventListener("click", function (e) {
    if (e.target.tagName === "LI") {
        inputPencarian.value = e.target.textContent;
        suggestionList.innerHTML = "";
    }
});
