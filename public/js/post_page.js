


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
        // console.log(e);
        let file = e.target.files[0];
        let fileReader = new FileReader();
        
        fileReader.readAsDataURL(file);
        
        fileReader.onload = function()
        {
            let dataUri = this.result;
            post_img[i].src = dataUri;

            post_img[i].style.opacity = 1;
            p_i_p[i].style.opacity = 0;
            // console.log(document.getElementsByClassName("post_inputs").length);
        }
    });
}



/** 機能の説明
 * プレビューを表示する
 */
let btn_border = document.getElementsByClassName("btn-border")[0];
let pop_background = document.getElementById("pop_background");
let main_modal = document.getElementById("main_modal");

let title;
let hash_arr = [];
let img_and_text = [
    {image: "", text: ""},
    {image: "", text: ""},
    {image: "", text: ""},
    {image: "", text: ""},
    {image: "", text: ""},
    {image: "", text: ""}
];

btn_border.addEventListener("click", displayPreview, true);
pop_background.addEventListener("click", hideModal, true);

function displayPreview(){

    hash_arr.splice(0);
    let hash = document.getElementsByClassName("hash");
    let hash_text = document.getElementsByClassName("hash_text");
    let post_img = document.getElementsByClassName("post_img");
    let text = document.getElementsByClassName("text");
    // console.log(post_img);
    // console.log(hash_text);

    //タイトルを配列に入れる
    title = document.getElementsByName("title")[0].value;

    //ハッシュを配列に入れる
    for(let i=0; i<hash.length; i++){
        if(!hash_text[i].value || !hash_text[i].value.match(/\S/g)){

        }else{
            hash_arr.push(hash_text[i].value);
        }
    }

    //画像を配列に入れる
    for(let i=0; i<post_inputs.length; i++){
        if(post_img[i].src != "http://localhost/top/post"){
            img_and_text[i].image = post_img[i].src;
        }else{
            img_and_text[i].image = "";
        }

        //説明を配列に入れる
        //<textarea>が空だったら
        if(!text[i].value || !text[i].value.match(/\S/g)){
            img_and_text[i].text = "";
        }else{
            img_and_text[i].text = text[i].value;
        }
    }

    console.log(title);
    console.log(hash_arr);
    console.log(img_and_text);

    let pushPreview = ``;
    pushPreview += `<div id="previewArticle">`
                    + `<div id="pa_userInfo">`
                    + `</div>`
                    + `<div id="thc_container">`
                        + `<div id="thc_c_title">`
                        + `</div>`
                        + `<div id="thc_c_hashs">`
                        + `</div>`
                        + `<div id="thc_c_ctf">`
                            + `<div id="ctf_comment"><i class="far fa-comment" style="color:#259b25;"></i></div>`
                            + `<div id="ctf_twitter"><i class="fab fa-twitter-squarel" style="color:#1da1f2;"></i></div>`
                            + `<div id="ctf_fav"><i id="" class="fa-heart far" style="color:#ff0000;"></i></div>`
                        + `</div>`
                    + `</div>`
                    + `<div id="pa_detail">`
                    + `</div>`
                +  `</div>`

    $("#pop_background").fadeIn("300");
    $("#main_modal").fadeIn("1000");

    let modal_centering_width = (pop_background.getBoundingClientRect().width - main_modal.getBoundingClientRect().width) / 2 + "px";
    let modal_centering_height = (pop_background.getBoundingClientRect().height - main_modal.getBoundingClientRect().height) / 2 + "px";
    main_modal.style.left = modal_centering_width;
    main_modal.style.top = modal_centering_height;
}

function hideModal(){
    $("#main_modal").children().remove();
    $("#pop_background").fadeOut("300");
    $("#main_modal").fadeOut("700");
}

{/* <div id="previewArticle">
    <div id="pa_userInfo">
        <img src="" alt="">
        <p></p>
    </div>
    <div id="thc_container">
        <div id="thc_c_title">
            <h2></h2>
        </div>
        <div id="thc_c_hashs">
            <p></p>
        </div>
        <div id="thc_c_ctf">
            <div id="ctf_comment">
                <i class="far fa-comment" style="color:#259b25;"></i>
            </div>
            <div id="ctf_twitter">
                <i class="fab fa-twitter-squarel" style="color:#1da1f2;"></i>
            </div>
            <div id="ctf_fav">
                <i id="" class="fa-heart far" style="color:#ff0000;"></i>
            </div>
        </div>
    </div>
    <div id="pa_detail">
        <img src="" alt="">
        <pre></pre>
    </div>
</div> */}