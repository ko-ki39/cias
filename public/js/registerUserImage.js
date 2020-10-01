let u_i_parent = document.getElementsByClassName("u_i_display_area")[0];
let u_i_display_area = document.getElementsByClassName("u_i_display_area")[0];
let u_i_input = document.getElementsByClassName("u_i_input")[0];
let u_i_img = document.getElementsByClassName("u_i_img")[0];
let IMAGE_SOUCE = "";

u_i_parent.addEventListener("change", function(e){

    let file = e.target.files[0];

    // ファイルリーダー作成
    var fileReader = new FileReader();

    fileReader.onload = function() {
        // Data URIを取得
        var dataUri = this.result;

        // img要素に表示
        u_i_img.src = dataUri;
        console.log(u_i_img.src);

        let ctx = document.getElementById('u_i_canvas').getContext('2d');
        let img = new Image();
        img.src = u_i_img.src;
        img.onload = function() {
            let canvasAspect = ctx.canvas.width / ctx.canvas.height; // canvasのアスペクト比
            let imgAspect = img.width / img.height; // 画像のアスペクト比
            let left, top, width, height;
    
            ctx.fillStyle = "black";
            ctx.fillRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    
            if(imgAspect >= canvasAspect) {// 画像が横長
                left = 0;
                width = ctx.canvas.width;
                height = ctx.canvas.width / imgAspect;
                top = (ctx.canvas.height - height) / 2;
            } else {// 画像が縦長
                top = 0;
                height = ctx.canvas.height;
                width = ctx.canvas.height * imgAspect;
                left = (ctx.canvas.width - width) / 2;
            }
            ctx.drawImage(img, 0, 0, img.width, img.height, 
                left, top, width, height);
        }
    }

    // ファイルをData URIとして読み込む
    fileReader.readAsDataURL(file);

    console.log(file);
    console.log(IMAGE_SOUCE);

    // let blobURL = window.URL.createObjectURL(fileList);
    // if(document.getElementById("u_i_img")){
    //     u_i_parent.removeChild(document.getElementsByClassName("u_i_img")[0]);
    // }
    // u_i_input.insertAdjacentElement("afterend", `<img src="${blobURL}">`);
}, false);

// u_i_parent.addEventListener("change", function (event) {
//     let reader = new FileReader();
//     reader.onload = function () {

//         // <img src="">
//         let dataUri = this.result;
//         u_i_img.setAttribute("src", dataUri);
//         IMAGE_SOUCE = atob(u_i_img.getAttribute("src"));
//         // console.log(u_i_img.getAttribute("src"));
//     }
//     reader.readAsDataURL(event.target.files[0]);
//     getAttr();
// }, false);

// function getAttr(){
//     console.log(IMAGE_SOUCE);
// }