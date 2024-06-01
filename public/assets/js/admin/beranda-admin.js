var slide1_image_prev = document.getElementById("slide1-image");
var slide2_image_prev = document.getElementById("slide2-image");
var slide3_image_prev = document.getElementById("slide3-image");
var s1_input_image = document.getElementById("slide1-img-value");
var s2_input_image = document.getElementById("slide2-img-value");
var s3_input_image = document.getElementById("slide3-img-value");

function changeImage(params) {
    console.log('ini params');
    console.log(params);

    if (s1_input_image.files && s1_input_image.files[0]) {
        const reader = new FileReader();

        console.log(reader);
        reader.onload = function (e) {
            params.src = e.target.result;
        };

        reader.readAsDataURL(s1_input_image.files[0]);
    }

    if (s2_input_image.files && s2_input_image.files[0]) {
        const reader = new FileReader();

        console.log(reader);
        reader.onload = function (e) {
            params.src = e.target.result;
        };

        reader.readAsDataURL(s2_input_image.files[0]);
    }
    
    if (s3_input_image.files && s3_input_image.files[0]) {
        const reader = new FileReader();

        console.log(reader);
        reader.onload = function (e) {
            params.src = e.target.result;
        };

        reader.readAsDataURL(s3_input_image.files[0]);
    }
    // if(s1_input_image.input)
}
