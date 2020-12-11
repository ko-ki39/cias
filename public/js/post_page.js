


/** 機能の説明
 * 画像を挿入する<input>を、中央寄せする
 */
let p_i_input_img = document.getElementsByClassName("p_i_input_img");
let post_file = document.getElementsByClassName("post_file");
let p_i_p = document.getElementsByClassName("p_i_p");
console.log(p_i_input_img[0].getBoundingClientRect().width - post_file[0].getBoundingClientRect().width);

window.onload = p_i_pCentering(0);

function p_i_pCentering(num){
    let centering_width = (p_i_input_img[num].getBoundingClientRect().width - p_i_p[num].getBoundingClientRect().width) / 2 + "px";
    let centering_height = (p_i_input_img[num].getBoundingClientRect().height - p_i_p[num].getBoundingClientRect().height) / 2 + "px";
    p_i_p[num].style.left = centering_width;
    p_i_p[num].style.top = centering_height;
}

function post_fileCentering(num){
    let centering_width = (outerWidth - innerWidth) / 2 + "px";
    post_file[num].style.left = centering_width;
}