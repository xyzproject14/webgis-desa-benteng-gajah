function editAdmin(index) {
    console.log(index);
    const username = document.getElementById("username-edit");
    const email = document.getElementById("email-edit");
    const password = document.getElementById("password-edit");
    const status = document.getElementById("status-edit");
    const selectAdmin = document.getElementsByClassName("opt-admin");
    const idAdmin = document.getElementById("id-edit");

    $(document).ready(function () {
        $.getJSON("/get-data-admin/" + index, function (data) {
            username.value = data["username"];
            email.value = data["email"];
            password.value = data["password"];
            // status.value = data["status"];
            // console.log("data : " + status.value);
            // console.log("status admin : " + selectAdmin[0].value);

            if (data["status"] == "superadmin") {
                selectAdmin[1].selected = true;
            }

            idAdmin.value = data["id"];
        });
    });
}

var selectedItem = document.getElementsByClassName("list");
function selected() {
    for (var item of selectedItem) {
        item.classList.remove("font-bold");
    }
    selectedItem[0].classList.add("font-bold");
}
selected();