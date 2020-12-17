


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
    console.log(hash.length);
    if(hash.length < 3){
        let hash_none = document.getElementsByClassName("hash_none");
        let last_hash = hash.length;
        
        $(".hash_none").eq(0).slideDown("fast");
        hash_none[0].classList.add("hash");
        hash[last_hash].classList.remove("hash_none");

        m_h_counter.innerText = hash_none.length;

        if(hash.length == 3){
            more_hash.innerHTML = "&nbsp;";
        }
    }
}

/** 機能の説明
 * さらに記事内容を追加する
 */
let more_inputs = document.getElementById("more_inputs");
let post_inputs = document.getElementsByClassName("post_inputs");
let m_i_counter = document.getElementById("m_i_counter");

more_inputs.addEventListener("click", inputs_displayMore, true);

function inputs_displayMore()
{
    if(post_inputs.length < 6){
        let pushInputs = ``;
        pushInputs += `<div class="post_inputs post_inputs_none" style="display:none;">`
                        + `<div class="p_i_delete" onclick="post_inputs_delete(this)"><span class="p_i_d_span">×</span></div>`
                        + `<div class="p_i_input_img">`
                            + `<div class="p_i_p">`
                                + `<p>画像を挿入</p>`
                                + `<input type="file" class="post_file" onclick="imageChange(${post_inputs.length}, this)" name="image${post_inputs.length + 1}" value="" required>`
                            + `</div>`
                            + `<img src="" alt="" class="post_img">`
                        + `</div>`
                        + `<textarea name="text${post_inputs.length + 1}" id="" cols="30" rows="10" class="text"  placeholder="" required></textarea>`
                    + `</div>`;

        more_inputs.insertAdjacentHTML("beforebegin", pushInputs);
        $(".post_inputs_none").eq(0).slideDown("fast");
        post_inputs[post_inputs.length - 1].classList.remove("post_inputs_none");
        p_i_pCentering(post_inputs.length - 1);

        if(post_inputs.length == 6){
            m_i_counter.innerText = "&nbsp;";
        }
        m_i_counter.innerText = 6 - post_inputs.length;
    }

    $("body").quietflow({
        theme : "starfield",
        starSize : 1.2,
        speed : 60
    });
}



/** 機能の説明
 * 記事内容を削除する
 */
function post_inputs_delete(e){
    console.log(e.parentNode);
    if(window.confirm("記事内容を削除しますか？")){
        let parent_post_inputs = e.parentNode;
        parent_post_inputs.parentNode.removeChild(parent_post_inputs);
        m_i_counter.innerText = 6 - post_inputs.length;
        for(let i=0; i<document.getElementsByClassName("text").length; i++){
            document.getElementsByClassName("post_file")[i].name = "image" + (i + 1);
            document.getElementsByClassName("text")[i].name = "text" + (i + 1);
        }
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

function imageChange(i, e)
{
    document.getElementsByClassName("post_file")[i].addEventListener("change", function(e)
    {
        console.log(e);
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



/** 機能の説明
 * プレビューを表示する
 */
let btn_border = document.getElementsByClassName("btn-border")[0];

btn_border.addEventListener("click", displayPreview, true);

function displayPreview(){
    window.alert("great.");
}