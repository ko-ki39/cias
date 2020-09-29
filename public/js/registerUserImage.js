let user_image = document.getElementById("user_image");
let u_i_preview = document.getElementById("user_image_preview");

user_image.addEventListener("change", function (event) {
    let reader = new FileReader();
    reader.onload = function (event) {

        // <img src="">
        u_i_preview.setAttribute("src", event.target.result);
    }
    reader.readAsDataURL(event.target.files[0]);
    Resize(250);

    function Resize(size){
        let orgWidth = u_i_preview.width;
        let orgHeight = u_i_preview.height;

        u_i_preview.width = size;
        u_i_preview.height = orgHeight * (u_i_preview.width / orgWidth);
    }
}, false);