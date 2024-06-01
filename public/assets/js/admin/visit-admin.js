let activateElement = null;
const terpencet = document.getElementById("terpencet");
const buttonPencet = document.getElementById("pencetButton");

function changeColor(index) {
    const inputElements = document.getElementsByClassName("radio-input");
    const elements = document.getElementsByClassName("icon-dropdown");
    const itemClicked = elements[index];
    const inputvalue = inputElements[index].value;

    if (activateElement !== null) {
        activateElement.classList.remove("bg-oranges");
    }

    itemClicked.classList.add("bg-oranges");
    // alert(inputvalue)

    activateElement = itemClicked;

    terpencet.classList.add("hidden");
    buttonPencet.innerHTML =
        `<img src="assets/icons/costumize/` +
        inputvalue +
        `" class="w-10 py-1 px-2" alt="" >`;
    // buttonPencet.innerHTML = 'Gsdfkj'
}

// function getIconValue() {
//     const updateRadioIcon =
//         document.getElementsByClassName("update-radio-input");

//     for (var element of updateRadioIcon) {
//         if (element.value == data["icon_name"]) {
//             // console.log("ini elemen cocok : " + element.value);
//             element.checked = true;
//         } else {
//             console.log(element.value);
//         }
//     }
// }

function getDataUpdate(index) {
    // const updateIconName = document.getElementById("update-icon-name");
    // const optionsUpdate = document.getElementsByClassName("option-update");

    $(document).ready(function () {
        $.getJSON("getDataUpdate/" + index, function (data) {
            const updateID = document.getElementById("update-id");
            const updateLocation = document.getElementById("update-lokasi");
            const updateDusun = document.getElementById("update-dusun");
            const updateType = document.getElementById("update-type");
            const updateLatlang = document.getElementById("update-latlang");
            const updateIcon = document.getElementById("update-icon");
            var updateRadioIcon =
                document.getElementsByClassName("update-radio-input");

            updateLocation.value = data["location"];

            switch (data["dusun"]) {
                case "Balocci":
                    selectedOpt = updateDusun.options[0];
                    selectedOpt.selected = true;
                    break;
                case "Harapan":
                    updateDusun.options[1].selected = true;
                    break;
                case "Polewali":
                    selectedOpt = updateDusun.options[2];
                    selectedOpt.selected = true;
                    break;
                case "Sakeang":
                    updateDusun.options[3].selected = true;
                    break;
            }

            console.log("update radion : " + updateRadioIcon[0].value);
            var nomor = 1;

            for (var element of updateRadioIcon) {
                if (element.value == data["icon_name"]) {
                    console.log("ini elemen cocok : " + element.value);
                    element.checked = true;
                } else {
                    console.log(element.value);
                }
            }
            // updateRadioIcon.forEach((element) => {
            //     console.log(element);

            //     // if(element.value == data['icon_name']){
            //     //     radioIcon = data['icon_name'];
            //     //     element.checked = true
            //     // }
            // });

            // updateDusun.value = "Dusun " + data["dusun"];
            // updateIconName.value = data["icon_name"];
            updateID.value = data["id"];
            updateType.value = data["type"];
            updateLatlang.value = data["latlang"];

            updateIcon.setAttribute(
                "src",
                "assets/icons/costumize/" + data["icon_name"]
            );
            // console.log("ini update icon : " + updateIcon.src);
        });
    });

    // const oldLocation = document.getElementsByClassName("old-lokasi");
    // const oldDusun = document.getElementsByClassName("old-dusun");
    // const oldLatlang = document.getElementsByClassName("old-latlang");
    // const oldType = document.getElementsByClassName("old-type");
    // const oldIcon = document.getElementsByClassName("old-icon");

    //
}

let updateActivateElement = null;
const updateTerpencet = document.getElementById("update-terpencet");
const updateButtonPencet = document.getElementById("update-pencetButton");

function updateChangeColor(index) {
    const inputElements = document.getElementsByClassName("update-radio-input");
    const elements = document.getElementsByClassName("update-icon-dropdown"); //label
    const itemClicked = elements[index];
    const inputvalue = inputElements[index].value;

    if (updateActivateElement !== null) {
        updateActivateElement.classList.remove("bg-oranges");
    }

    itemClicked.classList.add("bg-oranges");
    // alert(inputvalue)

    updateActivateElement = itemClicked;

    updateTerpencet.classList.add("hidden");
    updateButtonPencet.innerHTML =
        `<img src="assets/icons/costumize/` +
        inputvalue +
        `" class="w-10 py-1 px-2" alt="" >`;
    // buttonPencet.innerHTML = 'Gsdfkj'
}

// $(document).ready(function (){
//     $.getJSON('getUpdataData', function(data){

//     })
// })
