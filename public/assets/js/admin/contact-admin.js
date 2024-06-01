var hidden_id = document.getElementById("update-id");
var nama = document.getElementById("update-nama");
var pelayanan = document.getElementById("update-pelayanan");
var whatsapp = document.getElementById("update-whatsapp");
var image_name = document.getElementById("update-image-name");

// ===== GET OLD DATA =====
function getOldData(id) {
    $.getJSON("get-data-contact/" + id, function (data) {
        // console.log(data);
        hidden_id.value = id;
        nama.value = data["nama"];
        pelayanan.value = data["pelayanan"];
        whatsapp.value = data["whatsapp"];
        image_name.value = data["image_name"];
    });
    // console.log("welkom to mobil lejen" + id);
    // hidden_id.value = id;
}
// ===== GET OLD DATA =====
