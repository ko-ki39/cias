// const { functionsIn } = require("lodash");

let yjsnpi = document.getElementsByClassName("tippy_template")[0].innerHTML;
let mur = document.getElementsByClassName("tippy_template")[1].innerHTML;
let kmr = document.getElementsByClassName("tippy_template")[2].innerHTML;
let buttons = document.getElementsByClassName("heart-button-l");
let buttons2 = document.getElementsByClassName("twitter-button-l");
let buttons3 = document.getElementsByClassName("comment-button-l");
let article = document.getElementsByClassName("article");
let nowURL = location.href;
let nowHost = location.hostname;
let nowHostOrigin = location.origin;
// console.log(buttons);
// buttons[0].classList.remove("far");
// buttons[0].classList.add("fas");


/**
 * イベントリスナー
 */
// jQueryだと、繰り返し処理を入れずに、全てのクラスに適用される
// $(".heart-button-l").on("click", function(){
//     alert("great!!!");
// });
console.log(nowURL.substring(0, 40));
console.log("http://" + nowHost + "/top");
console.log(nowHostOrigin + "/top");
if(nowURL.substring(0, 40) == "https://" + nowHost + "/top/article_detail" ||
    nowURL.substring(0, 40) == "http://" + nowHost + "/top/article_detail" ||
    nowURL.substring(0, 40) == nowHostOrigin + "/top/article_detail" ||
    nowURL.substring(0, 40) == nowHostOrigin + "/top/article_detail"){
    buttons[0].addEventListener("click", function(e) {

        console.lop("読み込めてない！");
        // 塗り潰しされてない(favされてない、またはログインしていない)
        if(buttons[0].classList[4] == "far"){
            fav(0, "create");

            // 塗り潰しされてる(過去にお気に入りした)
        }else if(buttons[0].classList[4] == "fas"){
            fav(0, "delete");
        }
    }, true);
}else if(nowURL.substring(0, 25) == "https://" + nowHost + "/top" ||
        nowURL.substring(0, 25) == "https://" + nowHost + "/top" ||
        nowURL.substring(0, 25) == nowHostOrigin + "/top" ||
        nowURL.substring(0, 25) == nowHostOrigin + "/top"){
    for (let i = 0; i < article.length; i++){
        buttons[i].addEventListener("click", function(e){
            // console.log(e.target.classList);
            // console.log(buttons[i].classList);

            console.log("きた");
            // 塗り潰しされてない(favされてない、またはログインしていない)
            if(buttons[i].classList[4] == "far"){
                fav(i, "create");
                // requestTest();
                // 塗り潰しされてる(過去にお気に入りした)
            }else if(buttons[i].classList[4] == "fas"){
                fav(i, "delete");
            }
        }, true);
    }
}

for (let j = 0; j < article.length; j++) {
    buttons[j].addEventListener("mouseover", function(e) {
        if (buttons[j].classList[3] == "tippyLoginFav") {
            tippy_L();
        } else if (buttons[j].classList[3] == "tippyGuestFav") {
            tippy_G();
        }
    });
    buttons2[j].addEventListener("mouseover", function(e) {
        if (buttons[j].classList[3] == "tippyLoginFav") {
            tippy_L_Twitter();
        } else if (buttons[j].classList[3] == "tippyGuestFav") {
            tippy_G_Twitter();
        }
    });
    buttons3[j].addEventListener("mouseover", function(e) {
        if (buttons[j].classList[3] == "tippyLoginFav") {
            tippy_L_Comment();
        } else if (buttons[j].classList[3] == "tippyGuestFav") {
            tippy_G_Comment();
        }
    });
}



/**
 * Play Ground (^^)
 */
// select   :   選択した記事のID(整数)
// m_string :   イベントリスナーのクロージャーから受け取ったメソッド名(文字列)
function fav(select, m_string) {
    let article_id = document.getElementsByClassName("article_ajax_id")[select].value;
    let _method = m_string;

    // JSONでリクエストしても、Controller側でnullになってしまうので、FormData使ってます
    let formData = new FormData();
    formData.append("p_article_id", article_id);
    formData.append("p_method", _method)

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    })
    $.ajax({
            url: "/top/fav/",
            method: "post",
            data: formData,
            // data: {"p_article_id": article_id, "p_method": _method},
            processData: false,
            contentType: false,
        })
        // resData: ControllerからresponseしたJSONデータ
        //          中身はControllerを参照してください
        .done(function(resData, jqXHR) {
            if (resData.success_flag == "ok") {
                switch (resData.p_method) {
                    case "create":
                        buttons[select].classList.remove("far");
                        buttons[select].classList.add("fas");
                        break;
                    case "delete":
                        buttons[select].classList.remove("fas");
                        buttons[select].classList.add("far");
                        break;
                    case "exists":
                        break;
                }
                console.log(resData.message);
                console.log("method is: " + resData.p_method);
                console.log("article_id id: " + resData.p_article_id);
            } else if (resData.success_flag == "plz_login") {
                console.log(resData.message);
            } else if (resData.success_flag == "omg") {
                console.log(resData.message);
            }
        })
        .fail(function(error) {
            console.log("通信エラー", error);
        })
}

function tippy_L() {
    tippy('.tippyLoginFav', {
        content: yjsnpi,
        allowHTML: true,
        animation: "shift-toward-extreme",
        // delay: [0,300],
        hideOnClick: false,
    });
}

function tippy_G() {
    tippy('.tippyGuestFav', {
        content: yjsnpi,
        allowHTML: true,
        animation: "shift-toward-extreme",
        // delay: [0,300],
        hideOnClick: false,
    });
}

function tippy_L_Twitter() {
    tippy('.twitter-button-l', {
        content: mur,
        allowHTML: true,
        animation: "shift-toward-extreme",
        // delay: [0,300],
        hideOnClick: false,
    });
}

function tippy_G_Twitter() {
    tippy('.twitter-button-l', {
        content: mur,
        allowHTML: true,
        animation: "shift-toward-extreme",
        // delay: [0,300],
        hideOnClick: false,
    });
}

function tippy_L_Comment() {
    tippy('.comment-button-l', {
        content: kmr,
        allowHTML: true,
        animation: "shift-toward-extreme",
        // delay: [0,300],
        hideOnClick: false,
    });
}

function tippy_G_Comment() {
    tippy('.comment-button-l', {
        content: kmr,
        allowHTML: true,
        animation: "shift-toward-extreme",
        // delay: [0,300],
        hideOnClick: false,
    });
}



/**
 * マイページ、コメントした一覧から遷移して来た
 */
let q_p = decodeURI(location.search);
let c_l_c_detail = document.getElementsByClassName("c_l_c_detail");
let c_l_c_other = document.getElementsByClassName("c_l_c_other");
// console.log(q_p);

// element.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});

window.onload = function(){
    for(let i=0; i<c_l_c_detail.length; i++){
        if(c_l_c_detail[i].firstElementChild.innerHTML == q_p.slice(5)){
            scrolling(i);
            console.log("ixgy...\n", `counter = ${i}`);
            break;
        }
    }
}

function scrolling(i){
    c_l_c_other[i].scrollIntoView({behavior:"smooth", block:"center", inline:"center"});
}