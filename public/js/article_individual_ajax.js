'use strict';

/*** 機能の説明
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


/*** 機能の説明
*** ページ読み込み時に、article_listのアスペクト比を整える
*** 窓の大きさを変えたときにリサイズする
***/
let article_list = document.getElementsByClassName("article_list");
let wwwAFTER;
let wwwFLAG = 0;

function article_listAspect(){
    switch(wwwFLAG){
        case 0:
            wwwAFTER = article_list[0].getBoundingClientRect().width + "px";
            console.log(wwwAFTER);
            for(let i=0; i<article_list.length; i++){
                article_list[i].style.height = wwwAFTER;
            }
            wwwFLAG = 1;
            break;
        case 1:
            wwwAFTER = article_list[0].getBoundingClientRect().width + "px";
            for(let i=0; i<article_list.length; i++){
                article_list[i].style.height = wwwAFTER;
            }
            break;
    }
    console.log(`width=${wwwAFTER}`, "resized!!!", `height=${article_list[0].style.height}`);
}

window.onload = article_listAspect();
window.addEventListener("resize", article_listAspect, true);



/*** 機能の説明
*** a_l_detailをクリックしたら、モーダルを出す
***/
let a_l_detail = document.getElementsByClassName("a_l_detail");
let pop_background = document.getElementById("pop_background");
let main_modal = document.getElementById("main_modal");
let m_m_fav = document.getElementById("m_m_fav");
let m_m_com = document.getElementById("m_m_com");

//favのときはモーダルいらないことを、後から気づきました^^;
for(let i=0; i<article_list.length; i++){
    article_list[i].addEventListener("click", function(e){
        if(EX_choiceStatus == 1) displayModal(i);
    }, true);
}

pop_background.addEventListener("click", hideModal, true);

function displayModal(article_num){
    $("#pop_background").fadeIn("300");
    $("#main_modal").fadeIn("1000");

    let modal_centering_width = (pop_background.getBoundingClientRect().width - main_modal.getBoundingClientRect().width) / 2 + "px";
    let modal_centering_height = (pop_background.getBoundingClientRect().height - main_modal.getBoundingClientRect().height) / 2 + "px";
    main_modal.style.left = modal_centering_width;
    main_modal.style.top = modal_centering_height;

    //対象のarticle_id
    let article_id = article_list[article_num].firstElementChild.value;
    console.log(article_id);

    article_individualAjax(article_id);
}

function hideModal(){
    $("#main_modal").children().remove();
    $("#pop_background").fadeOut("300");
    $("#main_modal").fadeOut("700");
}



/** 機能の説明
 * ajax
 */
function article_individualAjax(articleID){
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({
        url: "/top/individual/fav_page/fp_cfAjax/",
        type: "GET",
        data: {
            "articleID": articleID,
        }
    }).done(function(data){
        console.log(data);
        console.log(
            `Title = ${data[2].title}\n`,
            `myImage = ${data[1].image}\n`,
            `myName = ${data[1].user_name}\n`,
            `detial = ${data[0][0].detail}\n`,
            `created_at = ${data[0][0].created_at}`
        );

        if(main_modal.firstElementChild != null){
            $("#main_modal").children().remove();
        }
        
        let pushCommentsTitle = `<div class="m_m_d_title"><h2><a href="/top/article_detail/${articleID}">${data[2].title}</a></h2></div>`;
        let pushComments = ``;

        for(let i=0; i<data[0].length; i++){
            pushComments +=   `<div class="m_m_details">`
                                + `<div class="m_m_d_userInfo">`
                                    + `<img src="/storage/${data[1].image}" alt="">`
                                    + `<p>${data[1].user_name}</p>`
                                + `</div>`
                                + `<div class="m_m_d_detail">`
                                    + `<pre>${data[0][i].detail}</pre>`
                                + `</div>`
                                + `<div class="m_m_d_time">`
                                    + `<a href="/top/article_detail/${articleID}?cfs=${data[0][i].detail}">このコメントまで移動</a>`
                                    + `<p>${data[0][i].created_at}</p>`
                                + `</div>`
                            + `</div>`
        }
        main_modal.insertAdjacentHTML("afterbegin", pushCommentsTitle);
        main_modal.insertAdjacentHTML("beforeend", pushComments);
        
    }).fail(function(data){
        console.log("OMG...");
    });
}