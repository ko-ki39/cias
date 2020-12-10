


/** 機能の説明
 * 画像を挿入する<input>を、中央寄せする
 */
let p_i_input_img = document.getElementsByClassName("p_i_input_img");
let post_file = document.getElementsByClassName("post_file");

window.onload = function()
{
    let post_centering_width = (p_i_input_img.offsetWidth - post_file.offsetWidth)/2;
    post_file.style.left = post_centering_width;
}

function post_inputCentering(i){

}