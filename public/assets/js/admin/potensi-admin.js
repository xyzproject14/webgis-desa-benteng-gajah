// ===== UPDATE DATA FUNCTION =====
function getOldData(params) {
    console.log(params);

    $(document).ready(function () {
        $.getJSON("get-data-potensi/" + params, function (data) {
            console.log(data);

            const updateId = document.getElementById("update-id");
            const updateDusun = document.getElementById("update-dusun");
            const updatePotensi = document.getElementById("update-potensi");
            const updateLuas = document.getElementById("update-luas");
            const updateKelompokTani = document.getElementById(
                "update-kelompok-tani"
            );

            updateId.value = data.id;
            updatePotensi.value = data.potensi;
            updateLuas.value = data.luas_lahan;
            updateKelompokTani.value = data.pemilik;

            switch (data.dusun) {
                case "balocci":
                    selectedOpt = updateDusun.options[0];
                    selectedOpt.selected = true;
                    break;
                case "harapan":
                    updateDusun.options[1].selected = true;
                    break;
                case "polewali":
                    selectedOpt = updateDusun.options[2];
                    selectedOpt.selected = true;
                    break;
                case "sakeang":
                    updateDusun.options[3].selected = true;
                    break;
            }
        });
    });
}
