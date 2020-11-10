let u_i_input = document.getElementsByClassName("u_i_input")[0]; //ファイルが変更されるとこ
let u_i_img = document.getElementsByClassName("u_i_img")[0]; //表示エリア


u_i_input.addEventListener("change", function(e) {

    let file = e.target.files[0];

    // ファイルリーダー作成
    var fileReader = new FileReader();

    fileReader.readAsDataURL(file);

    fileReader.onload = function() {
        // Data URIを取得
        var dataUri = this.result;

        // img要素に表示
        u_i_img.src = dataUri;
        console.log(u_i_img.src);
    }
}, true);
