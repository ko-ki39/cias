

// 変数宣言
let article_list = document.getElementsByClassName("article_list");
let c_nonActiv = document.getElementsByClassName("c_nonActiv");
let f_nonActiv = document.getElementsByClassName("f_nonActiv");
let fa_comments = document.getElementsByClassName("fa-comments");
let fa_gratipay = document.getElementsByClassName("fa-gratipay");
let main_right = document.getElementById("main_right");

// 排他制御のために使う変数
let EX_arg = 0; //１つ前にクリックした要素のインデックスを保持保持する
let EX_actionType = "";
let EX_firstAction = true; //trueだったら、まだ何も触っていない状態



/**
 * イベントリスナー
 */
// コメント
for(let i=0; i<article_list.length; i++){
    fa_comments[i].addEventListener("click", function(){
        exclusionController("comment", i);
    }, false);
}

// お気に入り
for(let j=0; j<article_list.length; j++){
    fa_gratipay[j].addEventListener("click", function(){
        exclusionController("fav", j);
    }, false);
}

// モーダル消すやつ
document.getElementById("pop_background").addEventListener("click", function(){
    $("#main_right").fadeOut("700");
    $("#pop_background").fadeOut("300");
});



/**
 * fanctions
 */
// 排他制御するためのやつ
function exclusionController(buttonType, select){

    //窓の大きさ(横)が720以下だったら、モーダルを表示する
    let window_W = document.documentElement.clientWidth;
    let window_H =document.documentElement.clientHeight;
    if(window_W <= 720){
        $("#main_right").fadeIn("1000");
        $("#pop_background").fadeIn("300");
    }

    //最初にクリックした場合
    if(EX_firstAction == true){
        EX_firstAction = false;
        document.getElementById("ajax_default").style.display = "none";
        switch(buttonType){
            case "comment":
                fa_comments[select].classList.remove("c_nonActiv");
                fa_comments[select].classList.add("c_Activ");
                fa_comments[select].style.color = "#259b25";
                displayCommentList("comment", select);
                break;
            case "fav":
                fa_gratipay[select].classList.remove("f_nonActiv");
                fa_gratipay[select].classList.add("f_Activ");
                fa_gratipay[select].style.color = "#c73246";
                displayFavList("fav", select);
                break;
        }
    }else{

        //同じところをクリックしたら、returnする
        if(EX_arg == select && EX_actionType == buttonType){
            return;

        }else{
            switch(buttonType){
                case "comment":
                    //前回クリックしたcomment
                    fa_comments[EX_arg].classList.remove("c_Activ");
                    fa_comments[EX_arg].classList.add("c_nonActiv");
                    fa_comments[EX_arg].style.color = "#9b9b9b";

                    //今クリックしたcomment
                    fa_comments[select].classList.remove("c_nonActiv");
                    fa_comments[select].classList.add("c_Activ");
                    fa_comments[select].style.color = "#259b25";

                    //favを全て灰色にする
                    fa_gratipay[EX_arg].style.color = "#9b9b9b";
                    fa_gratipay[select].style.color = "#9b9b9b";

                    displayCommentList("comment", select);
                    break;
                case "fav":
                    //前回クリックしたfav
                    fa_gratipay[EX_arg].classList.remove("f_Activ");
                    fa_gratipay[EX_arg].classList.add("f_nonActiv");
                    fa_gratipay[EX_arg].style.color = "#9b9b9b";

                    //今クリックしたfav
                    fa_gratipay[select].classList.remove("f_nonActiv");
                    fa_gratipay[select].classList.add("f_Activ");
                    fa_gratipay[select].style.color = "#c73246";

                    //commentを全て灰色にする
                    fa_comments[EX_arg].style.color = "#9b9b9b";
                    fa_comments[select].style.color = "#9b9b9b";

                    displayFavList("fav", select);
                    break;
            }
        }
    }
}

// コメント
function displayCommentList(buttonType, select){
    EX_arg = select;
    EX_actionType = buttonType;
    document.getElementById("ajax_favList").style.display = "none";
    document.getElementById("ajax_commentList").style.display = "block";
    // console.log(`article_number is : ${select}\nbutton_type is : ${buttonType}`);
    articleID = document.getElementsByClassName("delivery_a_id")[select].value;
    individualAjax("comments", articleID);
}

// お気に入り
function displayFavList(buttonType, select){
    EX_arg = select;
    EX_actionType = buttonType;
    document.getElementById("ajax_commentList").style.display = "none";
    document.getElementById("ajax_favList").style.display = "block";
    // console.log(`article_number is : ${select}\nbutton_type is : ${buttonType}`);
    articleID = document.getElementsByClassName("delivery_a_id")[select].value;
    individualAjax("favs", articleID);
}

//Controllerに通信する
function individualAjax(buttonType, articleID){
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({
        type: "GET",
        url: "/top/individual/cfAjax/",
        data: {
            "buttonType": buttonType,
            "articleID": articleID,
        }
    }).done(function(data){
        console.log(data);

        //commentアイコンをクリックしてたら、モーダルにコメント一覧を表示する
        if(buttonType == "comments"){
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
        }else if(buttonType == "favs"){
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