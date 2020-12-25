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



/** 機能の説明
 * 削除メニュー
 */
let fa_bars = document.getElementsByClassName("fa-bars");
let comment_deleteMenu = document.getElementsByClassName("comment_deleteMenu");
let c_dm_submit = document.getElementsByClassName("c_dm_submit");

// document.body.addEventListener("click", function(e){
//     if(e.target == fa_bars || e.target == comment_deleteMenu){
//         return;
//     }else{
//         $(".comment_deleteMenu").slideUp("fast");
//     }
//     console.log(e.target);
// });

function commentDeleteMenu(i)
{
    $(".comment_deleteMenu").eq(i).slideDown("slow");
    fa_bars[i].style.display = "none";
    // comment_deleteMenu[i].style.display = "block";
}

function commentDeleteMenu_confirm(elem){
    let con = confirm(`選択したコメントを削除しますか？¥n${elem.target}`);
    if(con == true){
        alert("コメントを削除しました");
        return true;
    }else{
        return false;
    }
}