/** 機能の説明
 * メインコンテンツとサイドバーの幅を調整する
 */
let main = document.getElementsByClassName("main")[0];
let content = document.getElementsByClassName("content")[0];
let side_bar = document.getElementsByClassName("side_bar")[0];
// let article = document.getElementsByClassName("article");

window.onload = resizeContent();
window.addEventListener("resize", resizeContent, true);

function resizeContent()
{
    let search_departmentWidth = document.getElementById("search_department").getBoundingClientRect().width;
    let search = document.getElementById("search");

    search.style.width = (search_departmentWidth - 8) + "px";

    let windowWidth = document.documentElement.clientWidth;

    if(windowWidth > 720){
        let mainWidth = main.getBoundingClientRect().width;
        let side_barWidth = side_bar.getBoundingClientRect().width;
        let calc_contentWidth = (mainWidth - side_barWidth) - 40;
    
        content.style.width = calc_contentWidth + "px";

        let article_maxDivisions = Math.floor(calc_contentWidth / 270);
        console.log((calc_contentWidth / article_maxDivisions));

        for(let i=0; i<article.length; i++){
            article[i].style.width = (calc_contentWidth / article_maxDivisions) - 15 + "px";
        }
    }
}