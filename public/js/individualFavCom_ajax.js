

// 変数宣言
let article_list = document.getElementsByClassName("article_list");
let c_nonActiv = document.getElementsByClassName("c_nonActiv");
let f_nonActiv = document.getElementsByClassName("f_nonActiv");
let fa_comments = document.getElementsByClassName("fa-comments");
let fa_gratipay = document.getElementsByClassName("fa-gratipay");

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






/**
 * fanctions
 */
// 排他制御するためのやつ
function exclusionController(buttonType, select){
    if(EX_firstAction == true){
        EX_firstAction = false;
        document.getElementById("ajax_default").style.display = "none";
        switch(buttonType){
            case "comment":
                fa_comments[select].classList.remove("c_nonActiv");
                fa_comments[select].classList.add("c_Activ");
                displayCommentList("comment", select);
                break;
            case "fav":
                fa_gratipay[select].classList.remove("f_nonActiv");
                fa_gratipay[select].classList.add("f_Activ");
                displayFavList("fav", select);
                break;
        }
    }else{
        if(EX_arg == select && EX_actionType == buttonType){
            return;
        }else{
            switch(buttonType){
                case "comment":
                    fa_comments[EX_arg].classList.remove("c_Activ");
                    fa_comments[EX_arg].classList.add("c_nonActiv");
                    fa_comments[select].classList.remove("c_nonActiv");
                    fa_comments[select].classList.add("c_Activ");
                    displayCommentList("comment", select);
                    break;
                case "fav":
                    fa_gratipay[EX_arg].classList.remove("f_Activ");
                    fa_gratipay[EX_arg].classList.add("f_nonActiv");
                    fa_gratipay[select].classList.remove("f_nonActiv");
                    fa_gratipay[select].classList.add("f_Activ");
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

//非同期でContollerに通信する
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
        if(buttonType == "comments"){
            let pushComments = '<div class="a_c_details">'
                            + '<div class="a_c_d_userInfo">'
                            + '<a href=""><img src="/storage/{{ Auth::user()->image }}" alt="ユーザーアイコン"></a>'
                            + '</div>'
                            + '</div>'
        }else if(buttonType == "favs"){
        }
    }).fail(function(data){
        console.log("no...");
    });
}