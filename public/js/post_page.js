


/** 機能の説明
 * 画像を挿入する<input>を、中央寄せする
 */
let p_i_input_img = document.getElementsByClassName("p_i_input_img");
let post_file = document.getElementsByClassName("post_file");
let p_i_p = document.getElementsByClassName("p_i_p");
let preview_button = document.getElementById("preview_button");
console.log(preview_button.firstElementChild.getBoundingClientRect().width);

window.onload = p_i_pCentering(0);

function p_i_pCentering(num)
{
    let centering_width = (p_i_input_img[num].getBoundingClientRect().width - p_i_p[num].getBoundingClientRect().width) / 2 + "px";
    let centering_height = (p_i_input_img[num].getBoundingClientRect().height - p_i_p[num].getBoundingClientRect().height) / 2 + "px";
    let centering_previewButton = (preview_button.getBoundingClientRect().width - preview_button.firstElementChild.getBoundingClientRect().width) / 2 + "px";
    p_i_p[num].style.left = centering_width;
    p_i_p[num].style.top = centering_height;
    preview_button.firstElementChild.style.left = centering_previewButton;
}



/** 機能の説明
 * 「×」を押したら、入力した文字を削除する
 */
let title_clearButton = document.getElementById("title_clearButton");
let hash_clearButton = document.getElementsByClassName("hash_clearButton");

title_clearButton.addEventListener("click", function(e){textClear(e.target)}, true);

for(let i=0; i<hash_clearButton.length; i++){
    hash_clearButton[i].addEventListener("click", function(e){textClear(e.target)}, true);
}

function textClear(e)
{
    let prevInput = e.previousElementSibling;
    console.log(prevInput.value);
    prevInput.value = "";
}



/** 機能の説明
 * さらにハッシュタグを追加する
 */
let more_hash = document.getElementById("more_hash");
let hash = document.getElementsByClassName("hash");
let m_h_counter = document.getElementById("m_h_counter");

more_hash.addEventListener("click", hash_displayMore, true);

function hash_displayMore()
{
    // console.log(hash.length);
    if(hash.length > 1){
        more_hash.innerHTML = "&nbsp;";
    }
    if(hash.length < 3){
        let hash_none = document.getElementsByClassName("hash_none");
        let last_hash = hash.length;
        
        $(".hash_none").eq(0).slideDown("fast");
        hash_none[0].classList.add("hash");
        hash[last_hash].classList.remove("hash_none");

        m_h_counter.innerText = hash_none.length;
    }else{
        return;
    }
}



/** 機能の説明
 * 画像を表示する
 */
// let post_file = document.getElementsByClassName("post_file");
// let p_i_p = document.getElementsByClassName("p_i_p");
let post_img = document.getElementsByClassName("post_img");

for(let i=0; i<post_file.length; i++){
    post_file[i].addEventListener("change", function(e)
    {
        let file = e.target.files[0];
        let fileReader = new FileReader();
        
        fileReader.readAsDataURL(file);
        
        fileReader.onload = function()
        {
            let dataUri = this.result;
            post_img[i].src = dataUri;

            post_img[i].style.opacity = 1;
            p_i_p[i].style.opacity = 0;
            console.log(document.getElementsByClassName("post_inputs").length);
        }
    });
}