/** 機能の説明
 * メインコンテンツとサイドバーの幅を調整する
 */
let main = document.getElementsByClassName("main")[0];
let main_article = document.getElementsByClassName("article")[0];
let side_bar = document.getElementsByClassName("side_bar")[0];

window.onload = resizeArticle();
window.addEventListener("resize", resizeArticle, true);

function resizeArticle()
{
    let windowWidth = document.documentElement.clientWidth;

    if(windowWidth > 720){
        let mainWidth = main.getBoundingClientRect().width;
        let side_barWidth = side_bar.getBoundingClientRect().width;
        let calc_main_articletWidth = (mainWidth - side_barWidth) - 40;

        main_article.style.width = calc_main_articletWidth + "px";
    }
}