let u_i_input = document.getElementsByClassName("u_i_input")[0]; //ファイルが変更されるとこ
let u_i_img = document.getElementsByClassName("u_i_img")[0]; //表示エリア
let post_file = document.getElementsByClassName("post_file");
let post_img = document.getElementsByClassName("post_img");

let nowURL = location.href;
let EX_input, EX_img;

if(nowURL == "http://127.0.0.1:8000/top/post"){
    EX_input = post_file;
    EX_img = post_img;
}else if(nowURL == "http://127.0.0.1:8000/register"){
    EX_input = u_i_input;
    EX_img = u_i_img;
}
console.log(EX_input, EX_img);



for(let i=0; i<EX_input.length; i++){
    EX_input[i].addEventListener("change", function(e){
        console.log("great.");
        let file = e.target.files[0];
        
        // ファイルリーダー作成
        let fileReader = new FileReader();
        
        fileReader.readAsDataURL(file);
        
        fileReader.onload = function() {
            // Data URIを取得
            let dataUri = this.result;
        
            // img要素に表示
            EX_img[i].src = dataUri;
        }
    });
}


// u_i_input.addEventListener("change", function(e) {

// }, true);
