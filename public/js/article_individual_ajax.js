'use strict';

/***
*** お気に入りとコメントを切り替える
***/
let fav_article = document.getElementById('fav_article');
let comment_article = document.getElementById('comment_article');
let choice = document.getElementsByClassName("choice")[0];
let EX_choiceStatus = 0;

function choiceButtonSwitch(e){
    console.log(e.target.id);
    if(e.target.id === "fav_button"){
        EX_choiceStatus = 0;
        fav_article.style.display = "flex";
        comment_article.style.display = "none";
        fav_button.style.backgroundColor = "#f8f8f8";
        comment_button.style.backgroundColor = "#c7c7c7";
    }else{
        EX_choiceStatus = 1;
        fav_article.style.display = "none";
        comment_article.style.display = "flex";
        fav_button.style.backgroundColor = "#c7c7c7";
        comment_button.style.backgroundColor = "#f8f8f8";
    }
}

choice.addEventListener("click", function(e){choiceButtonSwitch(e)}, true);


/***
*** ページ読み込み時に、article_listのアスペクト比を整える
*** 窓の大きさを変えたときにリサイズする
***/
let article_list = document.getElementsByClassName("article_list");
let www = article_list[0].getBoundingClientRect().width;
let wwwAFTER;
let wwwFLAG = 0;

function article_listAspect(){
    switch(wwwFLAG){
        case 0:
            for(let i=0; i<article_list.length; i++){
                article_list[i].style.height = www;
            }
            wwwFLAG = 1;
            break;
        case 1:
            wwwAFTER = article_list[0].clientWidth;
            for(let i=0; i<article_list.length; i++){
                article_list[i].style.height = wwwAFTER;
            }
            break;
    }
    console.log(`width=${wwwAFTER}`, "resized!!!", `height=${article_list[0].style.height}`);
}

window.onload = article_listAspect();
window.addEventListener("resize", article_listAspect, true);



/***
*** a_l_detailをクリックしたら、モーダルを出す
***/
let a_l_detail = document.getElementsByClassName("a_l_detail");
let pop_background = document.getElementById("pop_background");
let main_modal = document.getElementById("main_modal");
let m_m_fav = document.getElementById("m_m_fav");
let m_m_com = document.getElementById("m_m_com");

for(let i=0; i<article_list.length; i++){
    article_list[i].addEventListener("click", function(){
        switch(EX_choiceStatus){
            case 0:
                displayModal("fav");
                break;
            case 1:
                displayModal("com");
                break;
        }
    }, true);
}

pop_background.addEventListener("click", hideModal, true);

function displayModal(comfav){
    $("#pop_background").fadeIn("300");
    $("#main_modal").fadeIn("1000");
    switch(comfav){
        case "fav":
            m_m_fav.style.display = "block";
            m_m_com.style.display = "none";
            break;
        case "com":
            m_m_fav.style.display = "none";
            m_m_com.style.display = "block";
            break;
    }
}

function hideModal(){
    $("#pop_background").fadeOut("300");
    $("#main_modal").fadeOut("700");
}



/**
 * ajax
 */
function article_individualAjax(modalType, articleID){
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({
        url: "/top/individual/fav_page/fp_cfAjax/",
        type: "GET",
        data: {
            "modalType": modalType,
            "articleID": articleID,
        }
    }).done(function(data){
        console.log(data);

        //commentアイコンをクリックしてたら、モーダルにコメント一覧を表示する
        if(modalType == "comments"){
            if(document.getElementsByClassName("a_c_details") != null){
                $(".a_c_details").remove();
            }
            let pushComments = ``;
            for(let i=0; i<data[0].length; i++){
                pushComments += `<div class="a_c_details">`
                                    + `<div class="a_c_d_userInfo">`
                                        + `<a href="/top/individual/${data[0][i].user_id}"><img src="/storage/${data[1][i]}" alt=""></a>`
                                        + `<a href="/top/individual/${data[0][i].user_id}"> ${data[2][i]}</a>&nbsp;さん`
                                    + `</div>`
                                    + `<div class="a_c_d_commentDetail">`
                                        + `<pre>${data[0][i].detail}</pre>`
                                    + `</div>`
                                    + `<div class="a_c_d_other">`
                                        + `<a href="/top/article_detail/${data[0][i].article_id}">記事に移動</a>`
                                        + `<p>${data[0][i].created_at}</p>`
                                    + `</div>`
                                + `</div>`
            }
            //コメントが付いていなかったら
            if(!data[0].length){
                pushComments += `<div class="a_c_details">`
                                + `<h3>まだコメントがありませんm(__)m</h3>`
                              + `</div>`
            }
            document.getElementsByClassName("a_c_title")[0].insertAdjacentHTML("afterend", pushComments);

        //favアイコンをクリックしてたら、モーダルにコメント一覧を表示する
        }else if(modalType == "favs"){
            if(document.getElementsByClassName("a_f_details") != null){
                $(".a_f_details").remove();
            }
            let pushFavs = ``;
            for(let i=0; i<data[0].length; i++){
                pushFavs += `<div class="a_f_details">`
                                + `<div class="a_f_d_userInfo">`
                                    + `<a href="/top/individual/${data[0][i].user_id}"><img src="/storage/${data[1][i]}" alt=""></a>`
                                    + `<a href="/top/individual/${data[0][i].user_id}"> ${data[2][i]}</a>&nbsp;さん`
                                + `</div>`
                            + `</div>`
            }
            //お気に入りされていなかったら
            if(!data[0].length){
                pushFavs += `<div class="a_f_details">`
                            + `<h3>まだお気に入りされていませんm(__)m</h3>`
                          + `</div>`
            }
            document.getElementsByClassName("a_f_title")[0].insertAdjacentHTML("afterend", pushFavs);
        }
    }).fail(function(data){
        console.log("OMG...");
    });
}